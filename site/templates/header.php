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

<header id="header">
    <div class="Container">
        <nav id="nav" class="Flex">
            <div id="nav-icons">
                <button id="btn-hamburguer">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <button id="btn-close" class="Hidden">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div id="nav-1" class="Flex">
                <ul id="links-nav-1">
                    <li class="links"><a href="<?=$CURRENT_URL?>/" id="logo" class="Hidden"><img src="img/logo.png" alt="Hfashion" style="width: 100px"></a></li>
                    <li class="links"><a href="<?=$CURRENT_URL?>/dashboard.php">Dashboard</a></li>
                    <li class="links"><a href="<?=$CURRENT_URL?>/edit_profile.php">Editar Perfil</a></li>
                    <li class="links"><a href="<?=$CURRENT_URL?>/quizzes.php">Quizzes</a></li>
                    <li class="links"><a href="<?=$CURRENT_URL?>/ranking.php">Classificação</a></li>
                    <!-- A página adm.php é restrita, então vai ter que ter tratamento do backend depois -->
                    <li class="links"><a href="<?=$CURRENT_URL?>/adm.php">ADM</a></li> 
                </ul>
            </div>
            <a href="<?=$CURRENT_URL?>"><img src="img/logo-mobile.png" alt="Hfashion" id="logo-mobile" style="width: 40px"></a>
            <div id="nav-2">
                <a href="<?=$CURRENT_URL?>/dashboard.php>">
                    <div id="profile-img" style="background-image: url(img/users/user.png)" alt="Foto de Perfil"></div>
                    <div id="dropdown-profile"></div>
                </a>
            </div>
        </nav>
    </div>
</header>
