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
    <!--FONTE DE ÍCONES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body id="body">
                    <ul id="links-nav-2">
                        <?php if(!empty($userData)):?>
                            <li class="links"><a href="<?=$CURRENT_URL?>/edit_profile.php">Editar Perfil</a></li>
                            <li class="links"><a href="<?=$CURRENT_URL?>/process/logout_process.php">Sair</a></li>
                        <?php endif;?>
                        <?php if(empty($userData)):?>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<main>                          
    <div class="Container">
        <?php if(!empty($flashMessage)):?>
            <div class="msg-<?=$flashMessage["type"];?> Flex">
				<div id="msgIcon"><i class="<?=$flashMessage["icon"]?>"></i></div>
                <p><?=$flashMessage["msg"];?></p>
            </div>
        <?php endif;?>
