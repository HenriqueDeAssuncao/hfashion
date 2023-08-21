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

    //Crio e preencho o array que vou colocar na sessão com os values que o usuário digitou
    $userForm = [
        "type" => "signup",
        "nickname" => $nickname,
        "email" => $email,
        "password" => $password,
        "finalPassword" => $confirmpassword
    ];

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
                    $_SESSION["userForm"] = $userForm;
                    $message->setMessage("Apelido já cadastrado.", "error", "back");
                }

            } else {
                $_SESSION["userForm"] = $userForm;
                $message->setMessage("Email já cadastrado.", "error", "back");

            }
        } else {
            $_SESSION["userForm"] = $userForm;
            $message->setMessage("As senhas não são iguais", "error", "back");

        }
    } else {
        $_SESSION["userForm"] = $userForm;
        $message->setMessage("Preencha todos os campos.", "error", "back");
    }
} elseif ($type === "login") {
    $nickname_email = $_POST["nickname_email"];
    $password = $_POST["password"];

    //Antenticar usuário
    if ($userDao->authenticateUser($nickname_email, $password)) {
        $user = $userDao->authenticateUser($nickname_email, $password);
        $message->setMessage("Seja bem vindo, " . $user->getNickname() . "!", "success");
    } else {
        $userForm = [
            "type" => "signin",
            "nickname_email" => $nickname_email,
            "password" => $password
        ];
        $_SESSION["userForm"] = $userForm;
        $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");
    }
} else {
    $message->setMessage("Informações inválidas!", "error", "index.php");
}