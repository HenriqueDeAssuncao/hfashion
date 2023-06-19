<?php
    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
    $adm = new Adm($CURRENT_URL);
    $adm->isAdm($userDao, true);
?>