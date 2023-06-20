<?php
    require_once __DIR__ . ("/../templates/header.php"); //Porque o header já está incluindo vários arquivos

    if($userDao && $userData) {
        $userDao->destroyToken();

        if (!empty($_SESSION["quizToken"])) {
            $_SESSION["quizToken"] = "";
        }

    } else {
        $message->setMessage("Usuário não está logado.", "error");
    }