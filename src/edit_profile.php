<?php
require_once "templates/header.php";

require_once "models/User.php";
require_once "dao/UserDAO.php";
require_once "dao/UserAvatarDAO.php";

$user = new User();
$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(true);

$UserAvatarDao = new UserAvatarDAO($conn, $CURRENT_URL);
$userAvatars = $UserAvatarDao->findAvatars($userData->getId());

?>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/edit_profile.css">

<div id="edit-container">
    <form action="<?= $CURRENT_URL ?>/process/user_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update">
        <h2>Perfil</h2>
        <div class="form-group">
            <label>Foto de perfil</label>
            <div class="container-avatars">
                <?php if (!empty($userAvatars) && count($userAvatars)): ?>
                    <div class="user-avatars">
                        <?php foreach ($userAvatars as $UserAvatar): ?>
                            <div class="user-avatar">
                                <label for="avatar<?= $UserAvatar->getAvatarId() ?>">
                                    <div class="profile-img img"
                                        style="background-image: url('<?= $CURRENT_URL ?>/<?= $UserAvatar->getAvatarPath() ?>')"
                                        alt="Avatar">
                                    </div>
                                </label>
                                <input id="avatar<?= $UserAvatar->getAvatarId() ?>" type="radio" name="avatar-path"
                                    value="<?= $UserAvatar->getAvatarPath() ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <p id="p-avatars">Complete os quizzes para desbloquear as fotos de perfil</p>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-input" name="email" placeholder="<?= $userData->getEmail() ?>" readonly>
        </div>
        <div class="form-group">
            <label for="bio">Biografia</label>
            <input id="bio" type="" class="form-input" name="bio" value="<?= $userData->getBio() ?>">
        </div>
        <div class="form-group">
            <label for="nickname">Apelido</label>
            <input type="nickname" class="form-input" name="nickname" placeholder="Digite o novo apelido">
        </div>

        <input type="submit" class="btn-submit" value="Salvar mudanças">
    </form>

    <form action="<?= $CURRENT_URL ?>/process/user_process.php" method="POST">
        <input type="hidden" name="type" value="changepassword">
        <h2>Alterar senha</h2>
        <div class="form-group">
            <label for="password">Nova senha:</label>
            <input type="password" class="form-input" name="password" placeholder="Digite a nova senha">
        </div>
        <div class="form-group">
            <label for="confirmpassword">Confirmação de senha:</label>
            <input type="password" class="form-input" name="confirmpassword" placeholder="Confirme a senha">
        </div>

        <input type="submit" class="btn-submit" value="Alterar senha">
    </form>

</div>

<script src="<?= $CURRENT_URL ?>/script/edit_profile.js"></script>

<?php
require_once("templates/footer.php");
?>