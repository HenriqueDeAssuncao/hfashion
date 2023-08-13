<?php

require_once __DIR__ . "/../templates/header.php";

require_once __DIR__ . "/../helpers/verify_adm.php";

require_once __DIR__ . "/../helpers/verify_quiz.php";

?>

<?php
require_once __DIR__ . "/../templates/message.php";
?>

<h1>Criar Perguntas:</h1>
<form class="js-form" action="" method="POST">
    <div class="questions-container">
        <?php include_once("templates/question_form_group.php") ?>
    </div>
    <div class="form-group">
        <button class="btn-get-question-template">Próxima Pergunta</button>
        <button class="btn-submit">Adicionar ao quiz!</button>
    </div>
</form>

<link rel="stylesheet" href="css/adm_question_form.css">
<script src="<?= $CURRENT_URL ?>/script/get_question_template.js"></script>

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/global.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/message.css">
<script src="<?= $CURRENT_URL ?>/../script/message.js"></script>

<?php
require_once __DIR__ . "/../templates/footer.php";
?>