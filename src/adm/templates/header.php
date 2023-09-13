<?php

require_once __DIR__ . "/../../helpers/url.php";
require_once __DIR__ . "/../../helpers/db.php";
require_once __DIR__ . "/../../dao/UserDAO.php";
require_once __DIR__ . "/../../models/User.php";
require_once __DIR__ . "/../../models/Adm.php";

$message = new Message($CURRENT_URL);
$flashMessage = $message->getMessage();

if (!empty($flashMessage)) {
  $message->clearMessage();
}

//Carregando informações do usuário
$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(false);

$Adm = new Adm($CURRENT_URL);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HiFashion</title>
  <!--FONTE DE ÍCONES-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/global.css">
  <link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/message.css">
  <link rel="shortcut icon" href="<?= $CURRENT_URL ?>/../img/header/logo-mobile.png" type="image/x-icon">
</head>

<body>

  <header>
    <div class="Container">
      <nav>
        <ul>
          <ul>
            <li><a href="<?= $CURRENT_URL ?>/quiz.php">Novo quiz</a></li>
            <li><a href="<?= $CURRENT_URL ?>/editor.php">Novo artigo</a></li>
            <li><a href="#">Meus quizzes</a></li>
            <li><a href="#">Meus artigos</a></li>
            <li><a href="#">Painel</a></li>
          </ul>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="Container">