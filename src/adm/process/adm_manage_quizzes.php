<?php
require_once __DIR__ . "/../../helpers/url.php";
require_once __DIR__ . "/../../helpers/db.php";
require_once __DIR__ . "/../../dao/QuizDAO.php";
require_once __DIR__ . "/../../models/Message.php";

$Message = new Message($CURRENT_URL);

$QuizDao = new QuizDAO($conn, $CURRENT_URL);

if (!empty($_POST)) {
    $type = $_POST["type"];
    $quizId = $_POST["quizId"];

    if ($type === "questions") {

        $questionsNumber = $QuizDao->getQuestionsNumber($quizId);

        if (!$questionsNumber) {
            $quizToken = $_POST["quizToken"];
            $_SESSION["quizToken"] = $quizToken;
            header("Location: " . "$CURRENT_URL/../questions.php");
        } else {
            $Message->setMessage("O quiz já possui perguntas!", "error", "back");
        }

    } elseif ($type === "article") {

        $quizId = $_POST["quizId"];
        $articleId = $_POST["articleId"][0];

        $QuizDao->attachToArticle($quizId, $articleId);

        $Message->setMessage("O quiz foi relacionado com sucesso.", "success", "back");

    } elseif ($type === "active") {

        $articleId = $_POST["article-id"];
        $quizStatus = $QuizDao->findQuizStatus($quizId);

        if (!$quizStatus) {

            $questionsNumber = $QuizDao->getQuestionsNumber($quizId);

            if ($questionsNumber) {

                if($articleId) {
                    $QuizDao->setQuizStatusToActive($quizId);
                    $Message->setMessage("O quiz está disponivel para os usuários!", "success", "back");
                } else {
                    $Message->setMessage("O quiz deve estar relacionado com algum artigo para ser ativado!", "error", "back");
                }
                
            } else {
                $Message->setMessage("O quiz deve conter pelo menos 5 perguntas para ser ativado!", "error", "back");
            }

        } else {
            $Message->setMessage("O quiz já está ativo!", "error", "back");
        }

    }
}