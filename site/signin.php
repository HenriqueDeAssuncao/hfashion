<?php
    require_once("templates/header.php");
?>

<div id="register-container">
    <form action="<?=$CURRENT_URL?>/auth_process.php" method="POST">
        <input type="hidden" name="type" value="login">
        <div class="form-group">
            <label class="email" for="nickname_email">E-mail ou Apelido:</label>
            <input type="text" class="form-input" id="nickname_email" name="nickname_email">
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-input" id="password" name="password">
        </div>
        <div class="form-container">
            <input type="submit" class="Button btn-con" value="Conectar">
            <div class="form-group">
                <p>Não tem uma conta?</p>
                <p><a href="<?=$CURRENT_URL?>/signup.php">Faça seu cadastro</a></p>
            </div>
        </div>
    </form>
</div>

<?php
    require_once("templates/footer.php");
?>
