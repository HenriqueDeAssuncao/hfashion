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
    <form action="process/adm_process.php" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
            <h2>Atributos:</h2>
            <label for="quiz-name">Nome:</label>
            <input type="text" name="quiz-name" placeholder="Digite o nome do quiz">
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
            <input type="file" name="icon">
        </div>
        
        <div id="avatars" class="form-group">
            <label for="avatars">Insira os avatares:</label>
            <input type="file" name="avatars[]">
            <input type="file" name="avatars[]">
        </div>
        <input type="submit" class="Button" value="Criar Quiz!">
    </form>
</div>

<link rel="stylesheet" href="css/adm.css">
<script src="<?=$CURRENT_URL?>/script/quiz.js"></script>
<?php
    require_once("templates/footer.php");
?>