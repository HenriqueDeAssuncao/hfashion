<?php
require_once("templates/header_log.php");
?>

<?php
require_once("templates/message.php");
?>


<div style="display:inline-flexbox" class="flex">
    <a href=""><img class="back" src="<?= $CURRENT_URL ?>/img/login/Back.svg" style="height:30px" alt=""></a>
    <div style="display:inline-flexbox" id="register-container">

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




    <span style="inline-block" class="visual Flex">

        <span class="visual-content Flex">

            <img src="<?= $CURRENT_URL ?>/img/login/logo.svg" style="width: 280px" alt="">

            <p>Leve o espírito de High School Musical para o seu guarda-roupa com HiFashion</p>

            <img src="<?= $CURRENT_URL ?>/img/login/log1.png" alt="">

        </span>

</span>




</div>




<script src="<?= $CURRENT_URL ?>/script/message.js"></script>