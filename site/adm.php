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
            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar">
        </div>
            
        </div>
        
        <h2>Perguntas:</h2>
        <div id="create-question">
            <label for="set-questions">Selecione quantas questões você deseja gerar:</label>
            <select name="quant" id="quant">
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
            </select>
        </div>
        <div id="questions">
            
        </div>

        <button id="btn-create-question" class="Button">Gerar Perguntas</button>
        <input type="submit" class="Button" value="Criar Quiz!">
    </form>
</div>


<?php
    require_once("templates/footer.php");
?>