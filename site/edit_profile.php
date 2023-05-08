<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");

    $user = new User();
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);

    if ($userData->getImage() == "") {
        $userData->setImage("user.png");
    }
?>

<div id="edit-container">
    <form action="<?=$CURRENT_URL?>/user_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update">
        <h1>Altere seus dados no formulário abaixo:</h1>
        <div class="form-group">
            <label for="nickname">Digite o seu novo apelido:</label>
            <input type="nickname" class="form-input" name="nickname" value="<?=$userData->getNickname()?>" placeholder="Digite o novo apelido">
        </div>
        <h2>Senha:</h2>
        <p>Digite a sua nova senha e confirme para alterá-la:</p>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-input" name="password" placeholder="Digite a nova senha">
        </div>
        <div class="form-group">
            <label for="finalpassword">Confirmação de senha:</label>
            <input type="finalpassword" class="form-input" name="finalpassword" placeholder="Confirme a senha">
        </div>

        <div id="update-img" class="profile-img" style="background-image: url('<?=$CURRENT_URL?>/img/users/<?=$userData->getImage()?>')" alt="Foto de Perfil"></div>
        <div class="form-group">
            <label for="image">Foto:</label>
            <input type="file" name="image">
        </div>

        <div class="form-container">
            <input type="submit" class="Button" value="Editar">
        </div>
    </form>
</div>

<?php
    require_once("templates/footer.php");
?>