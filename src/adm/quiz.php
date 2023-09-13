<?php
require_once "templates/header.php";
require_once __DIR__ . "/../helpers/verify_adm.php";
?>

<?php
require_once __DIR__ . "/../templates/message.php";
?>

<div class="Container">
    <h1>Criar quiz</h1>
    <form action="process/adm_quiz_process.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="quiz-name">Nome:</label>
            <input type="text" name="quiz-name" placeholder="Digite o nome do quiz">
        </div>
        <div class="form-group">
            <label for="quiz-description">Descrição</label>
            <input type="text" name="quiz-description" placeholder="Crie uma descrção para o quiz">
        </div>
        <div class="form-group">
            <label for="question-weight">Peso das questões:</label>
            <select name="question-weight">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="form-group">
            <div class="form-section">
                <label for="emblem">Emblema:</label>
                <input type="file" name="emblem">
            </div>
            <div class="form-section">
                <label for="emblem-name">Nome:</label>
                <input type="text" name="emblem-name">
            </div>
        </div>
        <div class="form-group">
            <label for="quiz-icon">ícone:</label>
            <input type="file" name="icon">
        </div>

        <div id="avatars" class="form-group">
            <div class="form-section">
                <label for="avatars">Insira os avatares:</label>
                <input type="file" name="first-avatar">
                <input type="file" name="second-avatar">
            </div>
            <div class="form-section">
                <label for="avatars-names">Nomes:</label>
                <input type="text" name="avatars-names[]">
                <input type="text" name="avatars-names[]">
            </div>
        </div>
        <input type="submit" class="Button" value="Criar Quiz!">
    </form>
</div>

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/global.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/message.css">
<script src="<?= $CURRENT_URL ?>/../script/message.js"></script>

<?php
require_once __DIR__ . "/../templates/footer.php";
?>