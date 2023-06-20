<?php
    require_once("templates/header_log.php");
?>

<?php 
require_once("templates/message.php");
?>

<div class="flex">

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
                <input type="submit" class="btn-con" value="Conectar">
                <div class="form-group">
                    <p>Não tem uma conta?</p>
                    <p><a href="<?=$CURRENT_URL?>/signup.php">Faça seu cadastro</a></p>
                </div>
                </div>
        </form>
    </div>

    <div class="visual Flex">
        <div class="visual-content Flex">
            <img src="<?=$CURRENT_URL?>/img/login/logo.svg" style="width: 280px" alt="">
            <p>Leve o espírito de High School Musical para o seu guarda-roupa com HiFashion</p>
            <img src="<?=$CURRENT_URL?>/img/login/log1.png" alt="">
        </div>
    </div>

</div>

<script src="<?= $CURRENT_URL ?>/script/message.js"></script>