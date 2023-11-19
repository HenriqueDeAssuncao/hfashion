<?php
  require_once __DIR__ . "/../helpers/url.php";
  require_once __DIR__ . "/../helpers/db.php";
  require_once __DIR__ . "/../models/User.php";
  require_once __DIR__ . "/../dao/UserDAO.php";

  $userId = $_GET["userId"];
  $userDao = new UserDAO($conn, $CURRENT_URL);

  $userData = $userDao->findById($userId);

?>

<div class="container-user-popup">

    <button class="btn-close-user-popup">
        <img src="<?=$CURRENT_URL?>/img/dashboard/close.png" alt="Ícone de fechar" class="close-icon">
    </button>

    <div class="user-content Flex">

        <div class="container-img-user">
            <div class="img-user profile-img" style="background-image: url('<?= $CURRENT_URL ?>/<?= $userData->getImage() ?>')" alt="Avatar do usuário"> </div>
        </div>

        <div class="user-info">
            <div class="info-text">
                <p class="p-nickname"><?= $userData->getNickname() ?></p>
                <p class="p-email"><?= $userData->getEmail() ?></p>
                <a href="<?= $CURRENT_URL ?>/edit_profile.php" class="a-dashboard">editar perfil</a>
                <p class="p-bio"><?= $userData->getBio() ?></p>
            </div>
        </div>

    </div>

</div>