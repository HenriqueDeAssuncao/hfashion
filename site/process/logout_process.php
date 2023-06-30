<?php
    require_once __DIR__ . ("/../helpers/db.php");
    require_once __DIR__ . ("/../helpers/url.php");
    require_once __DIR__ . ("/../models/User.php");
    require_once __DIR__ . ("/../dao/UserDAO.php");
    
    if (!empty($_SESSION["token"])) {
        $token = $_SESSION["token"];
        $userDao = new UserDAO($conn, $CURRENT_URL);
        $userData = $userDao->verifyToken($token);
        if($userDao && $userData) {
            $userDao->destroyToken();
    
            if (!empty($_SESSION["quizToken"])) {
                $_SESSION["quizToken"] = "";
            }
    
        } else {
            $message->setMessage("Usuário não está logado.", "error");
        }
    }