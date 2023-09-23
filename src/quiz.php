<?php

require_once "dao/QuizDAO.php";
require_once "dao/UserAnswerQuestionDAO.php";
require_once "templates/head.php";

?>
  <!-- Os links de css estão aqui para ficarem dentro do header e carregarem mais rápido! -->
  <link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/quiz.css">

</head>

<?php
require_once "templates/header.php";


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
            $message->setMessage("Quiz não disponível", "error", "back");
        }
    } else {
        $message->setMessage("Página não encontrada", "error", "back");
    }
} else {
    $message->setMessage("Faça login para entrar na página", "error", "back");
}

?>

<div class="container-quiz">
    <div class="container-question">
        <?php include_once("templates/question.php") ?>
    </div>
</div>

<script src="<?= $CURRENT_URL ?>/script/questions.js"></script>

<?php
require_once "templates/footer.php";
?>