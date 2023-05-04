<?php
    require_once("templates/header.php"); //Porque o header já está incluindo vários arquivos

    if($userDao) {
        $userDao->destroyToken();
    }