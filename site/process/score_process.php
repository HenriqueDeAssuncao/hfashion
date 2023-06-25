<?php
require_once __DIR__ . "/../models/Question.php";
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/message.php";
require_once __DIR__ . "/../models/UserAnswerQuestion.php";

$message = new Message($CURRENT_URL);

if (!empty($_GET["n"]) && !empty($_GET["a"]) && !empty($_GET["w"])) {
    $stringUserAnswers = $_GET["a"];
    $userAnswers = explode(",", $stringUserAnswers);

    $questionWeight = $_GET["w"];

    $userAnswerQuestion = new UserAnswerQuestion($questionWeight);
    
    if (!empty($_SESSION["questions"])) {
        $questions = $_SESSION["questions"];
        $i = 0;
        foreach($questions as $question) {
            $isCorrect = $question->isAnswerCorrect($userAnswers[$i]);
            if ($isCorrect) {
                $userAnswerQuestion->increaseScore();
            }
            $i++;
        }
        echo $userAnswerQuestion->getScore();
    } else {
        $message->setMessage("Página não encontrada.", "error");
    }

} else {
    $message->setMessage("Página não encontrada.", "error");
}