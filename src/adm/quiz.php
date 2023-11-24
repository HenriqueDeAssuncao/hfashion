<?php
require_once "templates/header.php";
?>

<?php
require_once __DIR__ . "/../templates/message.php";
?>
</head>
<div class="Container">
<a href="<?= $CURRENT_URL ?>/index.php">  </a>
        <img class="back" src="<?= $CURRENT_URL ?>/../img/login/Back.svg" alt="">
   <h1>Criar quiz</h1>
    <form action="process/adm_quiz_process.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="quiz-name">Nome:</label>
            <input type="text" name="quiz-name" placeholder="Digite o nome do quiz" class="type">
        </div>
        <div class="form-group">
            <label for="quiz-description">Descrição:</label>
            <input type="text" name="quiz-description" placeholder="Crie uma descrção para o quiz" class="type">
        </div>
        <div class="form-group">
            <label for="question-weight" class="type">Peso das questões:</label>
            <select name="question-weight">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <hr>
        </div>
        <div class="form-group">
            <div class="form-section">
                <label for="emblem">Emblema:</label>
                <input type="file" name="emblem">
            </div>
            <div class="form-section">
                <label for="emblem-name">Nome do emblema:</label>
                <input type="text" name="emblem-name" class="type">
            </div>
        </div>
        <div class="form-group">
            <label for="quiz-icon">Ícone:</label>
            <input type="file" name="icon">
            <hr>
        </div>

        <div id="avatars" class="form-group">
            <div class="form-section">
                <label for="avatars" style="display: block;">Insira os avatares:</label>
                <input type="file" name="first-avatar" id="avatars" class="avatars" style="width: 100%;">
                <input type="file" name="second-avatar" id="avatars" class="avatars" style="width: 100%;">
            </div>
            <div class="form-section names">
                <label for="avatars-names">Nomes:</label>
                <input type="text" name="avatars-names[]" class="names">
                <input type="text" name="avatars-names[]" class="names">
            </div>
        </div>
        <div class="form-submit">
        <input type="submit" class="Button" value="Criar Quiz!">
        </div>
    </form>
</div>

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/global.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/message.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/create_quiz.css">
<script src="<?= $CURRENT_URL ?>/../script/message.js"></script>

<?php
require_once __DIR__ . "/../templates/footer.php";
?>