<?php
    require_once("templates/header_log.php");
    
    if (!empty($_SESSION["fill_form"])) {
        $data_fill_form = $_SESSION["fill_form"];
        $nickname = $data_fill_form[0];
        $email = $data_fill_form[1];
        $password = $data_fill_form[2];
        $confirmpassword = $data_fill_form[3];
    } else {
        $email = "";
        $nickname = "";
        $password = "";
        $confirmpassword = "";
    }
    if (!empty($data_fill_form)) {
        $_SESSION["fill_form"] = "";
    }
?>

<div id="register-container">
    <form action="<?=$CURRENT_URL?>/process/auth_process.php" method="POST">
        <input type="hidden" name="type" value="register">
        <div class="form-group">
            <label for="nickname">Apelido:</label>
            <input type="text" class="form-input" id="nickname" name="nickname" value="<?=$nickname?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-input" id="email" name="email" value="<?=$email?>">
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-input" id="password" name="password" value="<?=$password?>">
        </div>
        <div class="form-group">
            <label for="password">Confirmar Senha:</label>
            <input type="password" class="form-input" id="confirmpassword" name="confirmpassword" value="<?=$confirmpassword?>">
        </div>
        <div class="form-container">
            <input type="submit" class="Button" value="Criar Conta">
            <div class="form-group">
                <p>Já tem uma conta?</p>
                <p><a href="<?=$CURRENT_URL?>/signin.php">Faça seu login</a></p>
            </div>
        </div>
    </form>
</div>

<link rel="stylesheet" href="<?=$CURRENT_URL?>/css/login.css">
<?php
    require_once("templates/footer.php");
?>