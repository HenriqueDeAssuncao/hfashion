<?php
    require_once __DIR__ . "/../helpers/url.php";
    require_once __DIR__ . "/../helpers/db.php";
    require_once __DIR__ . "/../models/User.php";
    require_once __DIR__ . "/../models/Message.php";
    require_once __DIR__ . "/../dao/UserDAO.php";

    $message = new Message($CURRENT_URL);
    $userDao = new UserDao($conn, $CURRENT_URL);

    //Resgatando o tipo do formulário
    $type = $_POST["type"];
    
    //Verificando o tipo de formulário
    //Tem que fazer o tratamento dos inputs
    if ($type === "register") {
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        //Colocando na sessão pra preencher o formulário com os dados que o usuário já colocou pq se der erro eles não vão sumir ao recarregar
        $data_fill_form = [$nickname, $email, $password, $confirmpassword];
        $_SESSION["fill_form"] = $data_fill_form;
        
        //Verificando os dados

        if ($nickname && $email && $password && $confirmpassword) {
            if ($password === $confirmpassword) {
                //Verificar se o email já está cadastrado no sistema
                if ($userDao->findByEmail($email) === false) {
                    if ($userDao->findByNickname($nickname) === false) {
                        //Fazer o cadastro.
                        $user = new User();
                        //Criação de token e senha
                        $userToken = $user->generateToken();
                        $finalPassword = $user->generatePassword($password);
                        $user->setNickname($nickname);
                        $user->setEmail($email);
                        $user->setPassword($finalPassword);
                        $user->setToken($userToken);

                        $auth = true;

                        $userDao->create($user, $auth);
                    } else {
                        $message->setMessage("Apelido já cadastrado.", "error", "back");
        
                    }

                } else {
                    $message->setMessage("Email já cadastrado.", "error", "back");
    
                }
            } else {
                $message->setMessage("As senhas não são iguais", "error", "back");

            }
        } else {
            $message->setMessage("Preencha todos os campos.", "error", "back");
        }
    } elseif ($type === "login") {
        $nickname_email = $_POST["nickname_email"];
        $password = $_POST["password"];

        $data_fill_form = [$nickname_email, $password];
        $_SESSION["fill_form"] = $data_fill_form;

        //Antenticar usuário
        if ($userDao->authenticateUser($nickname_email, $password)) {
            $user = $userDao->authenticateUser($nickname_email, $password);
            $message->setMessage("Seja bem vindo, " . $user->getNickname() . "!", "success");
        } else {
            $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");
        }  
    } else {
        $message->setMessage("Informações inválidas!", "error", "index.php");
    }