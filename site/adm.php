<?php
    require_once("templates/header.php");

    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
    $adm = new Adm($CURRENT_URL); 
    $adm->isAdm($userDao, true);

    //AQUI EU ACABEI TENDO QUE FAZER UM AUTOPROCESSAMENTO ;(
    
    // if (!empty($_POST)) {
    //     $quiz = [];
    //     $question = $_POST["options[]"];
    //     for ($i=1; $i < 5 ; $i++) { 
    //         $options[$_POST["options[$i]"]];
    //     }
    // }


    // $_SESSION["quiz_name"] = "";
    // $_SESSION["question_weight"] = 0;
    
    // if (!empty($_POST)) {
    //     $_SESSION["quiz_name"] = $_POST["quiz-name"];
    //     $_SESSION["question_weight"] = $_POST["question-weight"];
    // }

?>

<div class="container">
    <h1>Criar quiz</h1>

    <form action="process/adm_process.php" method="POST"> 
        <div class="form-group">
            <h2>Atributos:</h2>
            <label for="quiz-name">Nome:</label>
            <input type="text" name="quiz-name" placeholder="Digite o nome do quiz">
        </div>
        <div class="form-group">
            <label for="question-weight">Peso das questões:</label>
            <input type="number" name="question-weight">
        </div>
        <input type="submit" class="Button" value="Confirmar">
        <div class="form-group">
            
        </div>

        <h2>Perguntas:</h2>
        <div id="questions">
            <?php
                include("templates/create_question.php");
            ?>
        </div>

        <button id="btn-create-question" class="Button">Próxima Pergunta</button>
        <input type="submit" class="Button" value="Criar Quiz!">
    </form>
</div>


<?php
    require_once("templates/footer.php");
?>