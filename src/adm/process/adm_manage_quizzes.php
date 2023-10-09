<?php
require_once __DIR__ . "/../../helpers/url.php";
require_once __DIR__ . "/../../helpers/db.php";
require_once __DIR__ . "/../../dao/QuizDAO.php";
require_once __DIR__ . "/../../models/Message.php";

$Meessage = new Message($CURRENT_URL);

$QuizDao = new QuizDAO($conn, $CURRENT_URL);

    if (!empty($_POST)) {
        $type = $_POST["type"];
        $quizId = $_POST["quizId"];

        if ($type === "questions") {
            # code...
        } elseif ($type === "article") {

        } elseif ($type === "active") {
            $QuizDao->setQuizStatusToActive($quizId);
            $Meessage->setMessage("O quiz está disponivel para os usuários!", "success", "back");
        }
    }