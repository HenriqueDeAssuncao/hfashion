<?php
    require_once("templates/header.php");
    if (!empty($_SESSION["fill_form"])) {
        $data_fill_form = $_SESSION["fill_form"];
        $nickname_email = $data_fill_form[0];
        $password = $data_fill_form[1];
    } else {
        $nickname_email = "";
        $password = "";
    }
    if (!empty($data_fill_form)) {
        $_SESSION["fill_form"] = "";
    }
?>

<div id="register-container">
    <form action="<?=$CURRENT_URL?>/process/auth_process.php" method="POST">
        <input type="hidden" name="type" value="login">
        <div class="form-group">
            <label class="email" for="nickname_email">E-mail ou Apelido:</label>
            <input type="text" class="form-input" id="nickname_email" name="nickname_email" value ="<?=$nickname_email?>">
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-input" id="password" name="password" value ="<?=$password?>">
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
