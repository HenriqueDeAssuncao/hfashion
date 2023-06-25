<?php
    require_once("templates/header_cad.php");
?>

<?php 
require_once("templates/message.php");
?>

<div class="flex">
<span style="inline-block" class="visual Flex">
        <span class="visual-content Flex">
            <img src="<?=$CURRENT_URL?>/img/login/logo.svg" style="width: 280px" alt="">
            <p>Viva a moda como nos tempos de High School Musical com HiFashion!</p>
            <img src="<?=$CURRENT_URL?>/img/login/fotocaad.png" alt="">
</span>
</span>
<a href=""><img class="back" src="<?= $CURRENT_URL ?>/img/login/Back.svg" style="height:30px display:inline-block" alt=""></a>
<div id="register-container">
    <form action="<?=$CURRENT_URL?>/process/auth_process.php" method="POST">
        <input type="hidden" name="type" value="register">
<div class="flex-1">
        <div class="form-group">
            <label for="nickname">Apelido:</label>
            <input type="text" class="form-input" id="nickname" name="nickname">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-input" id="email" name="email">
        </div>
</div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" placeholder="8+ caracteres" class="form-input" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password">Confirmar Senha:</label>
            <input type="password" class="form-input" id="confirmpassword" name="confirmpassword">
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
</div>
<script src="<?= $CURRENT_URL ?>/script/message.js"></script>