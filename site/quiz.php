<?php
require_once "templates/header.php";
require_once "dao/QuizDAO.php";

if (!empty($_GET["token"])) {
    $quizToken = $_GET["token"];
    $quizDao = new QuizDAO($conn, $CURRENT_URL);

    $questions = $quizDao->getQuestions($quizToken);
    $_SESSION["questions"] = $questions;
    $_SESSION["quizToken"] = $quizToken;
} else {
    $message->setMessage("Página não encontrada", "error", "back");
}

?>

<div class="container-quiz">
    <div class="container-question">
        <?php include_once("templates/question.php") ?>
    </div>
    <button class="btn-continue">Continuar</button>
</div>

<script src="<?= $CURRENT_URL ?>/script/adm/questions.js"></script>

<?php
require_once "templates/footer.php";
?>