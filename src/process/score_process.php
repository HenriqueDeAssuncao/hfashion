<?php
require_once __DIR__ . "/../models/Question.php";
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/message.php";
require_once __DIR__ . "/../dao/UserDAO.php";
require_once __DIR__ . "/../dao/QuizDAO.php";
require_once __DIR__ . "/../models/UserAnswerQuestion.php";
require_once __DIR__ . "/../dao/UserAnswerQuestionDAO.php";
require_once __DIR__ . "/../dao/AvatarDAO.php";
require_once __DIR__ . "/../dao/EmblemDAO.php";
require_once __DIR__ . "/../dao/UserEmblemDAO.php";
require_once __DIR__ . "/../dao/UserAvatarDAO.php";

$message = new Message($CURRENT_URL);

$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(false);
$quizDao = new QuizDAO($conn, $CURRENT_URL);

if ($userData) {
    if (isset($_GET["n"]) && isset($_GET["a"]) && isset($_GET["w"])) {
        //Pego os parâmetros da url:
        $questionsNumber = $_GET["n"];
        $stringUserAnswers = $_GET["a"];
        $userAnswers = explode(",", $stringUserAnswers);
        $questionWeight = $_GET["w"];

        //Atribuo a pontuação nesse objeto:
        $userAnswerQuestion = new UserAnswerQuestion();
        $userAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);

        if (!empty($_SESSION["questions"])) {
            //Pego as questões e o quizToken da sessão:
            $questions = $_SESSION["questions"];
            $quizToken = $_SESSION["quizToken"];

            $rightAnswers = 0;
            $i = 0;
            foreach ($questions as $question) {
                $isCorrect = $question->isAnswerCorrect($userAnswers[$i]);
                if ($isCorrect) {
                    $rightAnswers++;
                    $userAnswerQuestion->increaseScore($questionWeight);
                }
                $i++;
            }
            $scorePortion = "$rightAnswers/$i";

            $quizId = $quizDao->findQuizIdByToken($quizToken);
            $userId = $userData->getId();

            //Preenchendo o objeto userAnswerQuestion:
            $userAnswerQuestion->setScorePortion($scorePortion);
            $userAnswerQuestion->setQuizId($quizId);
            $userAnswerQuestion->setUserId($userId);

            //Registro no banco:
            $userAnswerQuestionDao->updateScore($userAnswerQuestion);

            //Recompensas do usuário:
            if ($questionsNumber == $rightAnswers) {
                $AvatarDao = new AvatarDAO($conn, $CURRENT_URL);
                $quizAvatars = $AvatarDao->findAvatars($quizId);
                $UserAvatarDao = new UserAvatarDAO($conn, $CURRENT_URL);
                //Coloco no array $avatars somente os avatares que o usuário não desbloqueou
                $avatars = [];
                foreach ($quizAvatars as $avatar) {
                    if ($UserAvatarDao->isAvatarUnlocked($userId, $avatar["avatar_id"]) === false) {
                        $avatars[] = $avatar;
                    }
                }
                
                $rewards = [
                    "type" => "avatars",
                    "avatars" => $avatars
                ];
                $_SESSION["rewards"] = $rewards;
            } else {
                $_SESSION["rewards"]["type"] = "emblem";
            }

            //Permito que o usuário acesse a página de recompensas
            $_SESSION["rewards"]["auth"] = "true";
       
            $EmblemDao = new EmblemDAO($conn, $CURRENT_URL);
            $UserEmblemDao = new UserEmblemDAO($conn, $CURRENT_URL);

            $quizEmblem = $EmblemDao->findEmblem($quizId);
            if ($UserEmblemDao->isEmblemUnlocked($userId, $quizEmblem["emblem_id"]) === false) {
                $emblem = $quizEmblem;
            }
            
            $UserEmblemDao->registerEmblem($userId, $quizId);

            $_SESSION["rewards"]["emblem"] = $emblem;

            $_SESSION["questions"] = "";
            $_SESSION["quizToken"] = "";

            $score = $userAnswerQuestion->getScore();
            header("Location: " . $CURRENT_URL . "/../rewards.php?correct=$rightAnswers&questions=$questionsNumber&score=$score");
            
        } else {
            $message->setMessage("Página não encontrada.", "error");
        }

    } else {
        $message->setMessage("Página não encontrada.", "error");
    }
} else {
    $message->setMessage("Usuário não autenticado", "error");
}