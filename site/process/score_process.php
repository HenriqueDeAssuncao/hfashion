<?php
require_once __DIR__ . "/../models/Question.php";
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/message.php";
require_once __DIR__ . "/../models/Quiz.php";
require_once __DIR__ . "/../dao/QuizDAO.php";
require_once __DIR__ . "/../models/UserAnswerQuestion.php";
require_once __DIR__ . "/../dao/UserAnswerQuestionDAO.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../dao/UserDAO.php";

$message = new Message($CURRENT_URL);

$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(false);
$quizDao = new QuizDAO($conn, $CURRENT_URL);

if ($userData) {
    if (!empty($_GET["n"]) && !empty($_GET["a"]) && !empty($_GET["w"])) {
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
            if ($questionNumber === $rightAnswers) {
                $_SESSION["rewards"] = "avatars";
            } else {
                $_SESSION["rewards"] = "emblem";
            }
            $_SESSION["questions"] = "";
            $_SESSION["quizToken"] = "";

            $score = $userAnswerQuestion->getScore();
            header("Location: " . $CURRENT_URL . "/../rewards.php?r=$rightAnswers&n=$questionsNumber&s=$score");
            
        } else {
            $message->setMessage("Página não encontrada.", "error");
        }

    } else {
        $message->setMessage("Página não encontrada.", "error");
    }
} else {
    $message->setMessage("Usuário não autenticado", "error");
}