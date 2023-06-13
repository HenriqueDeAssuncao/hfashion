<?php
require_once("templates/header.php");

$user = new User();
$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(true);
$adm = new Adm($CURRENT_URL);
$adm->isAdm($userDao, true);

?>

<div class="container">
    <h1>Criar quiz</h1>
    <form action="process/quiz_process.php" method="POST" enctype="multipart/form-data">
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
            <input type="number" name="question-weight">
        </div>
        <div class="form-group">
            <label for="emblem">Emblema:</label>
            <input type="file" name="emblem">
        </div>
        <div class="form-group">
            <label for="quiz-icon">ícone:</label>
            <input type="file" name="quiz-icon">
        </div>

        <div id="avatars" class="form-group">
            <div class="form-section">
                <label for="avatars">Insira os avatares:</label>
                <input type="file" name="avatars[]">
                <input type="file" name="avatars[]">
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

<link rel="stylesheet" href="css/adm.css">
<script src="<?= $CURRENT_URL ?>/script/quiz.js"></script>
<?php
require_once("templates/footer.php");
?>