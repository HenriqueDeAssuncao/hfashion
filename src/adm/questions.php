<?php
require_once "templates/header.php";
?>

<?php
require_once __DIR__ . "/../templates/message.php";
?>

<link rel="stylesheet" href="css/adm_question_form.css">

<div class="header">
    <button><i class="fa-solid fa-chevron-left"></i></button>
    <h1>Criar Perguntas:</h1>
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
<script src="<?= $CURRENT_URL ?>/../script/message.js"></script>

<?php
require_once __DIR__ . "/../templates/footer.php";
?>