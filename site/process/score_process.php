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

            $i = 0;
            foreach ($questions as $question) {
                $isCorrect = $question->isAnswerCorrect($userAnswers[$i]);
                if ($isCorrect) {
                    $userAnswerQuestion->increaseScore($questionWeight);
                }
                $i++;
            }

            $quizId = $quizDao->findQuizIdByToken($quizToken);
            $userId = $userData->getId();

            //Preencho o objeto userAnswerQuestion:
            $userAnswerQuestion->setQuizId($quizId);
            $userAnswerQuestion->setUserId($userId);

            $userAnswerQuestion->updateTries();
            //Registro no banco:
            $userAnswerQuestionDao->updateScore($userAnswerQuestion);

            $_SESSION["questions"] = "";
            $_SESSION["quizToken"] = "";
            $_SESSION["rewards"] = true;

            //Recompensas do usuário:
            

        } else {
            $message->setMessage("Página não encontrada.", "error");
        }

    } else {
        $message->setMessage("Página não encontrada.", "error");
    }
} else {
    $message->setMessage("Usuário não autenticado", "error");
}