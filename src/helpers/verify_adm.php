<?php
require_once __DIR__ . ("/../dao/UserDAO.php");
require_once __DIR__ . ("/../models/User.php");
require_once __DIR__ . ("/../models/Adm.php");

$Adm = new Adm($CURRENT_URL);

$user = new User();
$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(true);

$Adm->isAdm($userDao, true);
?>