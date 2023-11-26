<?php
require_once "templates/header.php";

if (empty($_SESSION["quizToken"])) {
    $message->setMessage("Você não tem permissão para acessar essa página", "error", "kick");
} 

?>

<?php
require_once __DIR__ . "/../templates/message.php";
?>

<link rel="stylesheet" href="css/adm_question_form.css">

<div class="header">
    <a href="<?= $CURRENT_URL ?>/quiz.php" class="back">
        <img src="<?= $CURRENT_URL ?>/../img/login/Back.svg" alt="">
    </a>
    <h1>Adicionar Perguntas</h1>
</div>

<main class="container">
    <form class="js-form" action="" method="POST" enctype="multipart/form-data">
        <div class="questions-container">
            <?php
            require_once "templates/question_form_group.php";
            ?>
        </div>

        <div class="form-group controls">
            <button class="btn-get-question-template">Próxima Pergunta</button>
            <button class="btn-submit">Adicionar ao quiz!</button>
        </div>
    </form>
</main>

<script src="<?= $CURRENT_URL ?>/script/get_question_template.js"></script>

<?php
require_once "templates/footer.php";
?>