<?php
    include_once ("helpers/url.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HFashion</title>
    <link rel="stylesheet" href="<?=$CURRENT_URL?>/css/styles.css">
    <!--FONTE DE ÍCONES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="<?=$BASE_URL?>/script/main.js"></script> -->
</head>
<body>
    
<div class="Container">
    <header class="Flex">
        <div id="nav-icons">
            <button id="btn-hamburger">
                <i class="fa-solid fa-bars"></i>
            </button>
            <button id="btn-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <i class="fa-solid fa-user"></i>
        <a href="<?=$CURRENT_URL?>/dashboard.php"><i class="fa-solid fa-user"></i></a>
    </header>
    <nav id="nav-list">
        <ul>
            <li><a href="<?$CURRENT_URL?>/login.php">Login/Cadastro</a></li>
            <li><a href="<?$CURRENT_URL?>/quizes.php">Ver quizes</a></li>
            <li><a href="<?$CURRENT_URL?>/dashboard.php">Dashboard</a></li>
        </ul>
    </nav>