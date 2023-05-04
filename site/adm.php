<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");

    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
    $adm = new Adm($CURRENT_URL); 
    $adm->isAdm($userDao, true);
?>

<?php
    require_once("templates/footer.php");
?>