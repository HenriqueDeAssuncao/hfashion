<?php
require_once("templates/header_auth.php");
?>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/cadastro.css">

<div class="Flex">
    <div style="display:inline-flexbox" class="visual Flex Full-height">
        <div style="display:inline-flexbox" class="visual-content Flex Full-height">
            <img class="logo" src="<?= $CURRENT_URL ?>/img/login/logo.svg" style="width: 220px" alt="">
            <img class="txt" src="<?= $CURRENT_URL ?>/img/login/texto_cad.svg" style="width: 280px" alt="">
            <img class="foto" src="<?= $CURRENT_URL ?>/img/login/foto_cad.svg" style="width: 375px;" alt="">
        </div>
    </div>

    <a href="<?= $CURRENT_URL ?>/index.php"><img class="back" src="<?= $CURRENT_URL ?>/img/login/Back.svg"
            style="height:30px" alt=""></a>
    <div id="register-container">

        <div class="container-msg">
            <?php
            require_once("templates/message.php");
            ?>
        </div>

        <img src="<?= $CURRENT_URL ?>/img/login/titulo.svg" style="height:15px" alt="">
        <p class="title">Cadastre-se ao <br> HiFashion</p>

        <form action="<?= $CURRENT_URL ?>/process/auth_process.php" method="POST">
            <input type="hidden" name="type" value="register">
            <div class="flex-1">
                <div class="form-group">
                    <label for="nickname">Apelido:</label>
                    <input type="text" class="form-input" id="nickname" name="nickname" value="<?= $nickname ?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-input" id="email" name="email" value="<?= $email ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" placeholder="8+ caracteres" class="form-input" id="password" name="password" value="<?= $password ?>">
            </div>
            <div class="form-group">
                <label for="password">Confirmar Senha:</label>
                <input type="password" class="form-input" id="confirmpassword" name="confirmpassword" value="<?= $finalPassword ?>">
            </div>
            <div class="form-container">
                <input type="submit" class="btn-cad" value="Criar Conta">
                <div class="form-group">
                    <p>Já tem uma conta?</p>
                    <p><a href="<?= $CURRENT_URL ?>/signin.php">Faça seu login</a></p>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?= $CURRENT_URL ?>/script/message.js"></script>