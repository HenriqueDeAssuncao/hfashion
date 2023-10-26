<?php
require_once "templates/header.php";
?>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/edit_profile.css">

<!-- PARTE SUPERIOR -->

<div class="Container">
    <form action="<?=$CURRENT_URL?>/process/user_process.php" method="POST" enctype="multipart/form-data" method="POST">
        <div class="profile">
            <label for="image">Foto de perfil</label>
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
        <div class="password">

        </div>
        <input class="btn-submit" type="submit" value="Salvar mudanças">
    </form>
</div>




<div class="pi">
    <form>
        <!-- FOTOS PARA O PERFIL -->
        <div class="bttxt2">
            <h3 class="txt2">Foto de perfil</h3>
        </div>
        <div class="bt2">
            <div class="icon">
                <label for="selecionar-arquivo">
                    <img src="img/edit_profile/icon1.png" alt="Imagem 1">
                    <img src="img/edit_profile/icon2.png" alt="Imagem 2">
                    <img src="img/edit_profile/icon3.png" alt="Imagem 3">
                </label>
                <input id="selecionar-arquivo" type="file" style="display: none;">
                <img src="img/edit_profile/icon4.png" alt="Imagem 4">
            </div>
        </div>
        <div class="legend">
            <p>Responda os quizzes para desbloquear as fotos para seu perfil</p>
        </div>
    </form>
</div>

<!-- FORMULÁRIO -->
<div class="boxtext">
    <form>
        <div class="form-group">
            <label class="email" for="email">E-mail:</label>
            <input type="email" class="form-input" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label class="bio" for="text">Biografia</label>
            <textarea id="my-textarea" required></textarea>
        </div>

        <div class="form-group">
            <label class="nome" for="nickname">Nome:</label>
            <input type="text" class="form-input" id="nickname" name="nickname" required>
        </div>
        <div class="bt">
            <button class="submit-btn" type="submit"><span>Salvar mudanças</span></button>
        </div>
    </form>
</div>

<?php
require_once("templates/footer.php");
?>