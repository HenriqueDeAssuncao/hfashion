<?php
require_once "templates/head.php";
?>
  <!-- Os links de css estão aqui para ficarem dentro do header e carregarem mais rápido! -->
  <link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/edit_profile.css">
</head>

<?php

require_once "models/User.php";
require_once "dao/UserDAO.php";
require_once "dao/UserAvatarDAO.php";

$user = new User();
$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(true);

$UserAvatarDao = new UserAvatarDAO($conn, $CURRENT_URL);
$userAvatars = $UserAvatarDao->findAvatars($userData->getId());
require_once "templates/header.php";

?>

<style>
    .user-avatar img {
        width: 100px;
    }
</style>

<div id="edit-container">
    <form action="<?= $CURRENT_URL ?>/process/user_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update">
        <h2>Altere seus dados no formulário abaixo:</h2>
        <h2>Perfil:</h2>
        <div class="form-group">
            <label>Foto:</label>
            <div class="profile-img" style="width: 100px; height: 100px; background-image: url('<?=$CURRENT_URL?>/<?=$image?>')" alt="Foto de Perfil"></div>
            <?php if(!empty($userAvatars) && count($userAvatars)):?>
                <div class="user-avatars">
                <?php foreach($userAvatars as $UserAvatar):?>
                    <div class="user-avatar"> 
                        <label for="avatar-path">
                            <img src="<?=$CURRENT_URL?>/<?=$UserAvatar->getAvatarPath()?>" alt="Imagem avatar">
                        </label>
                        <input type="radio" name="avatar-path" value="<?=$UserAvatar->getAvatarPath()?>">
                    </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
            <input type="submit" value="Salvar Imagem">
        </div>
        <div class="form-group">
            <label for="bio">Altere sua bio:</label>
            <input type="bio" class="form-input" name="bio" value="<?= $userData->getBio() ?>">
        </div>
        <div class="form-group">
            <label for="nickname">Digite o seu novo apelido:</label>
            <input type="nickname" class="form-input" name="nickname" placeholder="Digite o novo apelido">
        </div>
        <div class="form-container">
            <input type="submit" class="Button" value="Salvar">
        </div>
    </form>

    <form action="<?= $CURRENT_URL ?>/process/user_process.php" method="POST">
        <input type="hidden" name="type" value="changepassword">
        <h2>Senha:</h2>
        <p>Digite a sua nova senha e confirme para alterá-la:</p>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-input" name="password" placeholder="Digite a nova senha">
        </div>
        <div class="form-group">
            <label for="confirmpassword">Confirmação de senha:</label>
            <input type="password" class="form-input" name="confirmpassword" placeholder="Confirme a senha">
        </div>
        <div class="form-container">
            <input type="submit" class="Button" value="Alterar">
        <div>
    </form>

</div>

<?php
require_once("templates/footer.php");
?>