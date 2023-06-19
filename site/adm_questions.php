<?php

require_once("templates/header.php");

require_once("helpers/verify_adm.php");

require_once("helpers/verify_quiz.php");

?>

<?php
require_once("templates/message.php");
?>

<h1>Criar Perguntas:</h1>
<form class="js-form" action="" method="POST">
    <div class="questions-container">
        <?php include_once("templates/template_question.php") ?>
    </div>
    <div class="form-group">
        <button class="btn-get-question-template">Próxima Pergunta</button>
        <button class="btn-submit">Adicionar ao quiz!</button>
    </div>
</form>

<link rel="stylesheet" href="css/question_form.css">
<script src="<?= $CURRENT_URL ?>/script/adm/get_question_template.js"></script>

<?php
require_once("templates/footer.php");
?>