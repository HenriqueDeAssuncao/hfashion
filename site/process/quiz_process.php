<?php
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/Message.php";
require_once __DIR__ . "/../models/Quiz.php";
require_once __DIR__ . "/../dao/QuizDAO.php";
require_once __DIR__ . "/../models/Emblem.php";
require_once __DIR__ . "/../dao/EmblemDAO.php";
require_once __DIR__ . "/../models/Avatar.php";
require_once __DIR__ . "/../dao/AvatarDAO.php";
require_once __DIR__ . "/../dao/UserDAO.php";

$message = new Message($CURRENT_URL);
$quiz = new Quiz($message);
$quizDao = new QuizDAO($conn, $CURRENT_URL);
$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(true);

if ((!empty($_POST)) && (!empty($_FILES))) {

    $quizName = ucwords(trim($_POST['quiz-name']));
    $quizDescription = $_POST['quiz-description'];
    $questionWeight = $_POST['question-weight'];
    $emblem = $_FILES['emblem'];
    $emblemName = $_POST['emblem-name'];
    $icon = $_FILES['icon'];
    $firstAvatar = $_FILES['first-avatar'];
    $secondAvatar = $_FILES['second-avatar'];
    $avatarsArray = $_POST['avatars-names'];
    if ($avatarsArray[0] && $avatarsArray[1]) {
        $avatarsNames = $avatarsArray;
    }

    //Verifico se todos os campos foram preenchidos
    if ($quizName && $quizDescription && $questionWeight && $emblem && $emblemName && $icon && $firstAvatar && $secondAvatar) {
        //Verifico se todas as imagens são válidas e recebo como retorno o caminho para guardá-las
        $emblemPath = $quiz->verifyImg($emblem, "emblems");
        $iconPath = $quiz->verifyImg($icon, "icons");
        $firstAvatarPath = $quiz->verifyImg($firstAvatar, "avatars");
        $secondAvatarPath = $quiz->verifyImg($secondAvatar, "avatars");

        if ($emblemPath && $iconPath && $firstAvatarPath && $secondAvatar) {
            $moveEmblem = $quiz->uploadImg($emblem, $emblemPath);
            $moveIcon = $quiz->uploadImg($icon, $iconPath);
            $moveFirstAvatar = $quiz->uploadImg($firstAvatar, $firstAvatarPath);
            $moveSecondAvatar = $quiz->uploadImg($secondAvatar, $secondAvatarPath);

            //Pego o id do usuário
            $userId = $userData->getId();
            //Se foi feito o upload de todas as imagens eu cadastro o quiz
            //Cadastro o quiz
            $quizToken = $quiz->generateToken();

            $quiz->setUserId($userId);
            $quiz->setQuizName($quizName);
            $quiz->setQuizDescription($quizDescription);
            $quiz->setQuestionWeight($questionWeight);
            $quiz->setQuizToken($quizToken);
            $quiz->setIconPath($iconPath);

            $quizDao->createQuiz($quiz);
            $quizId = $quizDao->findQuizIdByToken($quizToken);

            //Cadastro as imagens nas suas tabelas

            //ARRUMAR ESSA GAMBIARRA 
            $emblem  = new Emblem;
            $emblemDao = new EmblemDAO($conn, $CURRENT_URL);
            $firstAvatar = new Avatar;
            $secondAvatar = new Avatar;
            $firstAvatarDao = new AvatarDAO($conn, $CURRENT_URL);
            $secondAvatarDao = new AvatarDAO($conn, $CURRENT_URL);

            if ($quizId) {
                $emblem->setEmblemName($emblemName);
                $emblem->setEmblemPath($emblemPath);
                $emblem->setQuizId($quizId);
                $emblemDao->createEmblem($emblem);

                $firstAvatar->setAvatarName($avatarsNames[0]);
                $firstAvatar->setAvatarPath($firstAvatarPath);
                $firstAvatar->setQuizId($quizId);
                $firstAvatarDao->createAvatar($firstAvatar);

                $secondAvatar->setAvatarName($avatarsNames[1]);
                $secondAvatar->setAvatarPath($secondAvatarPath);
                $secondAvatar->setQuizId($quizId);
                $secondAvatarDao->createAvatar($secondAvatar);

                $quizDao->setQuizTokenToSession($quizToken);

                $message->setMessage("Quiz criado com sucesso!", "success", "adm_questions.php");

            } else {
                $message->setMessage("Não foi possível registrar o quiz.", "error", "back");
            }
            
        } else {
            $message->setMessage("Não foi possível fazer o upload das imagens inseridas!", "error", "back");
        }

    } else {
        $message->setMessage("Todos os campos são obrigatórios!", "error", "back");
    }

} else {
    $message->setMessage("Todos os campos são obrigatórios!", "error", "back");
}