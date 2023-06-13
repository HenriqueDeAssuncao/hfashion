<?php
    require_once("templates/header.php");

    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
    $adm = new Adm($CURRENT_URL); 
    $adm->isAdm($userDao, true);
    
?>

<div class="create-questions-container">
    <h1>Criar Perguntas:</h1>
    <form action="questions_process.php" method="POST">
        <div class="add-questions">
            <?php include_once("templates/form_question.php")?>
        </div>
        <div class="form-group">
            <button class="btn-create-question">Próxima Pergunta</button>
            <button class="btn-submit">Adicionar ao quiz!</button>
        </div>
    </form>
</div>

<link rel="stylesheet" href="css/form_question.css">
<script src="<?=$CURRENT_URL?>/script/create-quiz.js"></script>
<?php
    require_once("templates/footer.php");
?>