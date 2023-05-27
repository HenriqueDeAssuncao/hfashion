<?php
    require_once("templates/header.php");

    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
    $adm = new Adm($CURRENT_URL); 
    $adm->isAdm($userDao, true);

    //AQUI EU ACABEI TENDO QUE FAZER UM AUTOPROCESSAMENTO ;(
    $_SESSION["quiz_name"] = "";
    $_SESSION["question_weight"] = 0;
    if (!empty($_POST)) {
        $_SESSION["quiz_name"] = $_POST["quiz-name"];
        $_SESSION["question_weight"] = $_POST["question-weight"];
    }

?>

<div class="container">
    <h1>Criar quiz</h1>

    <h2>Atributos:</h2>
    <form action="adm.php" method="POST">
        <div class="form-group">
            <label for="quiz-name">Nome:</label>
            <input type="text" name="quiz-name" placeholder="Digite o nome do quiz" value='<?=$_SESSION["quiz_name"]?>'>
        </div>
        <div class="form-group">
            <label for="question-weight">Peso das questões:</label>
            <input type="number" name="question-weight" value='<?=$_SESSION["question_weight"]?>'>
        </div>
        <input type="submit" class="Button" value="Confirmar">
    </form>

    <h2>Perguntas:</h2>
    <form action="adm.php" method="post">
        <div id="question">
            <?php
                include("templates/create_question.php");
            ?>
        </div>
    </form>

</div>


<?php
    require_once("templates/footer.php");
?>