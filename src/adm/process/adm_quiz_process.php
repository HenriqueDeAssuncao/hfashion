<?php
require_once __DIR__ . "/../../helpers/url.php";
require_once __DIR__ . "/../../models/Message.php";
require_once __DIR__ . "/../../models/Quiz.php";
require_once __DIR__ . "/../../dao/QuizDAO.php";
require_once __DIR__ . "/../../models/Emblem.php";
require_once __DIR__ . "/../../dao/EmblemDAO.php";
require_once __DIR__ . "/../../models/Avatar.php";
require_once __DIR__ . "/../../dao/AvatarDAO.php";

require_once __DIR__ . "/../../dao/UserDAO.php";

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
    $avatarsNamesArray = $_POST['avatars-names'];

    if ($firstAvatar && $secondAvatar) {
        $avatars = [$firstAvatar, $secondAvatar];
    }

    if ($avatarsNamesArray[0] && $avatarsNamesArray[1]) {
        $avatarsNames = $avatarsNamesArray;
    }

    //Verifico se todos os campos foram preenchidos
    if ($quizName && $quizDescription && $questionWeight && $emblem && $emblemName && $icon && $avatars && $avatarsNames) {
        //Verifico se todas as imagens são válidas e recebo como retorno o caminho para guardá-las
        $emblemPath = $quiz->verifyImg($emblem, "emblems");
        $iconPath = $quiz->verifyImg($icon, "icons");

        $avatarsPaths = [];
        foreach ($avatars as $avatar) {
            $avatarPath = $quiz->verifyImg($avatar, "avatars");
            $avatarsPaths[] = $avatarPath;
        }

        if ($emblemPath && $iconPath && $avatarsPaths) {
            $moveEmblem = $quiz->uploadImg($emblem, $emblemPath);
            $moveIcon = $quiz->uploadImg($icon, $iconPath);

            $i = 0;
            $moveAvatars = [];
            foreach ($avatarsPaths as $avatarPath) {
                $moveAvatar = $quiz->uploadImg($avatars[$i], $avatarPath);
                $moveAvatars[] = $moveAvatar;
                $i++;
            }

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

            $emblem = new Emblem;
            $emblemDao = new EmblemDAO($conn, $CURRENT_URL);
            $avatar = new Avatar;
            $avatarDao = new AvatarDAO($conn, $CURRENT_URL);

            if ($quizId) {
                $emblem->setEmblemName($emblemName);
                $emblem->setEmblemPath($emblemPath);
                $emblem->setQuizId($quizId);
                $emblemDao->createEmblem($emblem);

                $i = 0;
                foreach ($avatars as $item) {
                    $avatar->setQuizId($quizId);
                    $avatar->setAvatarName($avatarsNames[$i]);
                    $avatar->setAvatarPath($avatarsPaths[$i]);
                    $avatarDao->createAvatar($avatar);

                    $i++;
                }

                $quizDao->setQuizTokenToSession($quizToken);

                $message->setMessage("Quiz criado com sucesso!", "success", "questions.php");

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