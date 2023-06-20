<?php

    if (!isset($adm)) {
        require_once __DIR__ . ("/../dao/UserDAO.php");
        require_once __DIR__ . ("/../models/User.php");
        require_once __DIR__ . ("/../models/Adm.php");
    }

    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
    $adm = new Adm($CURRENT_URL);
    $adm->isAdm($userDao, true);

?>