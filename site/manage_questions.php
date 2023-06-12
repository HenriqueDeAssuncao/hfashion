<?php
    require_once("templates/header.php");

    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
    $adm = new Adm($CURRENT_URL); 
    $adm->isAdm($userDao, true);
    
?>

<div class="create-questions-container">
    <form action="questions_process.php" method="POST">
        
    </form>
</div>

<script src="<?=$CURRENT_URL?>/script/quiz.js"></script>
<?php
    require_once("templates/footer.php");
?>