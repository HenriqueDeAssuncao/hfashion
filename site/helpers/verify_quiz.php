<?php
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/Message.php";
require_once __DIR__ . "/../dao/QuizDAO.php";

$message = new Message($CURRENT_URL);

if (!empty($_SESSION["quizToken"])) {
    $quizToken = $_SESSION["quizToken"];

    $quizDao = new QuizDAO($conn, $CURRENT_URL);
    $status = $quizDao->getQuizStatusByToken($quizToken);

    if ($status) {
        $message->setMessage("O quiz já foi publicado.", "error", "back");
    }
} else {
    $message->setMessage("Não encontramos o quiz.", "error", "kick");
}

?>