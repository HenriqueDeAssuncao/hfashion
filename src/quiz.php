<?php

require_once "helpers/db.php";
require_once "helpers/url.php";
require_once "models/Message.php";
require_once "dao/UserDAO.php";
require_once "dao/QuizDAO.php";
require_once "dao/UserAnswerQuestionDAO.php";

$Message = new Message($CURRENT_URL);

$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(true);

if (!empty($userData)) {
    if (!empty($_GET["token"])) {
        $quizToken = $_GET["token"];
        $quizDao = new QuizDAO($conn, $CURRENT_URL);
        $userAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);

        $quizId = $quizDao->findQuizIdByToken($quizToken);
        if ($userAnswerQuestionDao->isQuizAvailable($userData->getId(), $quizId)) {
            $questions = $quizDao->getQuestions($quizToken);
            $_SESSION["questions"] = $questions;
            $_SESSION["quizToken"] = $quizToken;
        } else {
            $Message->setMessage("Quiz não disponível", "error", "back");
        }
    } else {
        $Message->setMessage("Página não encontrada", "error", "back");
    }
} else {
    $Message->setMessage("Faça login para entrar na página", "error", "back");
}

?>

<div vw class="enabled">
  <div vw-access-button class="active"></div>
  <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
  </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
  new window.VLibras.Widget();
</script>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiFashion</title>
    <link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/global.css">
    <link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/quiz.css">
</head>

<body>
    <div class="Container Flex">
        <div class="container-quiz">
            <div class="Container quiz-status Flex">
                <a href="<?= $CURRENT_URL ?>/quizzes.php" class="icon-popup Flex">
                    <img src="<?= $CURRENT_URL ?>/img/quizzes/exit.png" alt="Ícone fechar" class="status-popup">
                </a>
                <div class="progress-bar-container Box-shadow">
                    <div class="progress-bar"></div>
                </div>
                <div class="countdown">10</div>
            </div>
            <div class="container-question">

                <?php include_once("templates/question.php") ?>
            </div>
        </div>
    </div>
</body>

<script src="<?= $CURRENT_URL ?>/script/questions.js"></script>

</html>