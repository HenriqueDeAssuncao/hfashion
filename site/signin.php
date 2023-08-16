<?php
require_once("templates/header_log.php");
?>

<a class="back" href=""><img src="<?= $CURRENT_URL ?>/img/login/Back.svg" style="height:30px" alt=""></a>

<div style="display:inline-flexbox" class="Flex">

    <div style="display:inline-flexbox" id="register-container">

        <?php
        require_once("templates/message.php");
        ?>

        <img src="<?= $CURRENT_URL ?>/img/login/titulo.svg" style="height:15px" alt="">
        <p class="title">Conecte-se ao <br> HiFashion</p>

        <form action="<?= $CURRENT_URL ?>/process/auth_process.php" method="POST">
            <input type="hidden" name="type" value="login">
            <div class="form-group">
                <label class="email" for="nickname_email">E-mail ou Apelido:</label>
                <input type="text" class="form-input" id="nickname_email" name="nickname_email">
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" placeholder="8+ caracteres" class="form-input" id="password" name="password">
            </div>

            <div class="form-container">
                <input type="submit" class="btn-con" value="Conectar">
                <div class="form-group">
                    <p>Não tem uma conta?</p>
                    <p><a href="<?= $CURRENT_URL ?>/signup.php">Faça seu cadastro</a></p>
                </div>
            </div>
        </form>
    </div>

    <div style="inline-block" class="visual Flex">
        <div class="visual-content Flex">
            <img class="Logo" src="<?= $CURRENT_URL ?>/img/login/logo.svg" style="width: 240px" alt="">
            <img class="txt" src="<?= $CURRENT_URL ?>/img/login/texto.png" style="width: 328px" alt="">
            <img class="foto" src="<?= $CURRENT_URL ?>/img/login/log1.png" style="width: 400px; height: 350px;" alt="">
        </div>
    </div>

</div>

<script src="<?= $CURRENT_URL ?>/script/message.js"></script>