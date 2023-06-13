<?php
require_once __DIR__ . ("/../helpers/url.php");
require_once __DIR__ . ("/../helpers/db.php");
require_once __DIR__ . ("/../dao/UserDAO.php");
require_once __DIR__ . ("/../models/User.php");
require_once __DIR__ . ("/../models/Adm.php");

$message = new Message($CURRENT_URL);
$flashMessage = $message->getMessage();

if (!empty($flashMessage)) {
    $message->clearMessage();
}

$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(false);
$adm = new Adm($CURRENT_URL);

if (empty($userData)) {
    $image = "user.svg";
} else {
    $image = $userData->getImage();
    if ($userData->getImage() == "") {
        $image = "user.svg";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HFashion</title>
    <link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/global.css">
    <!--FONTE DE ÍCONES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header class="header White js-header">
        <div class="Container">
            <nav class="nav Flex">
                <div class="nav-icons">
                    <button class="btn-hamburguer Color-white Button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <button class="btn-close Hidden Button">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div id="nav-1" class="nav-1 Flex">
                    <ul class="links-nav-1">
                        <li class="links">
                            <a href="<?= $CURRENT_URL ?>/" class="logo Hidden">
                                <img class="logo-desktop" src="img/header/logo-black.svg" alt="Hfashion" style="width: 100px">
                            </a>
                        </li>
                        
                        <li class="links"><a href="<?= $CURRENT_URL ?>/dashboard.php">Dashboard</a></li>

                        <li class="links"><a href="<?= $CURRENT_URL ?>/quizzes.php">Quizzes</a></li>

                        <?php if ($userData): ?>
                            <?php if ($adm->isAdm($userDao, false)): ?>
                                <li class="links"><a href="<?= $CURRENT_URL ?>/adm.php"><i class="fa-solid fa-gear"></i></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                    </ul>
                </div>

                <a href="<?= $CURRENT_URL ?>"><img src="<?= $CURRENT_URL ?>/img/header/logo-mobile.png" alt="Hfashion" class="logo-mobile" style="width: 40px"></a>

                <div class="nav-2">
                    <button class="btn-dropdown Button">
                        <div class="profile-pic-header profile-img"
                            style="background-image: url(<?= $CURRENT_URL ?>/img/avatars/<?= $image ?>)"
                            alt="Foto de Perfil"></div>
                    </button>
                    <div class="dropdown-rect Hidden">
                        <div class="dropdown-tri">

                        </div>
                        <ul class="links-nav-2">
                            <?php if (!empty($userData)): ?>
                                <li class="links"><a href="<?= $CURRENT_URL ?>/edit_profile.php">Editar Perfil</a></li>
                                <li class="links"><a href="<?= $CURRENT_URL ?>/process/logout_process.php">Sair</a></li>
                            <?php endif; ?>
                            <?php if (empty($userData)): ?>
                                <li class="links"><a href="<?= $CURRENT_URL ?>/signin.php">Entrar</a></li>
                                <li class="links"><a href="<?= $CURRENT_URL ?>/signup.php">Cadastrar</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="Container">
            <?php if (!empty($flashMessage)): ?>
                <div class="msg-<?= $flashMessage["type"]; ?> Flex">
                    <div id="msgIcon"><i class="<?= $flashMessage["icon"] ?>"></i></div>
                    <p>
                        <?= $flashMessage["msg"]; ?>
                    </p>
                </div>
            <?php endif; ?>