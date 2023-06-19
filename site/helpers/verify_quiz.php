<?php
    require_once __DIR__ . "/../helpers/url.php";
    require_once __DIR__ . "/../models/Message.php";
    require_once __DIR__ . "/../dao/QuizDAO.php";

    $message = new Message($conn, $CURRENT_URL);

    if($_SESSION["token"]) {
        $quizToken = $_SESSION["token"];
    }

    $quizDao = new QuizDAO($conn, $CURRENT_URL);
    $status = $quizDao->getQuizStatusByToken($quizToken);

    if ($status !== false) {
        $message->setMessage("Quiz já foi publicado.", "error", "back");
    }
?>