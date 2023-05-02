<?php
    require_once ("helpers/url.php");
    require_once ("data/cards.php");
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
</head>
<body>

<header class="Container">
    <nav id="nav" class="Flex">
        <div id="nav-icons">
            <button id="btn-hamburguer">
                <i class="fa-solid fa-bars"></i>
            </button>
            <button id="btn-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="nav-1">
            <a href="<?=$CURRENT_URL?>/" id="logo"><img src="" alt="Hfashion"></a>
            <ul id="links-nav-1">
                <li class="links"><a href="<?=$CURRENT_URL?>/dashboard.php">Dashboard</a></li>
                <li class="links"><a href="<?=$CURRENT_URL?>/quizzes.php">Quizzes</a></li>
                <li class="links"><a href="<?=$CURRENT_URL?>/ranking.php">Classificação</a></li>
                <!-- A página adm.php é restrita, então vai ter que ter tratamento do backend depois -->
                <li class="links"><a href="<?=$CURRENT_URL?>/adm.php">ADM</a></li> 
            </ul>
        </div>

        <img src="" alt="Hfashion" class="hidden">
        
        <div id="nav-2">
            <!-- Aqui eu vou verificar se o usuário está logado. Se ele estiver, eu mostro pra ele esses botões, senão, eu mostro a foto de perfil dele que redireciona para dashboard. Mas no mobile é só a foto de perfil msm -->
            <input type="text"> 
            <ul id="links-nav-2">
                <li class="links"><a href="<?=$CURRENT_URL?>/sign_in.php">Conectar</a></li>
                <li class="red"><a href="<?=$CURRENT_URL?>/sign_up.php">Criar Conta</a></li>
            </ul>
        </div>
    </nav>
</header>
