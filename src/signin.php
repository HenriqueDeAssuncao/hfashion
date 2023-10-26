<?php
require_once("templates/header_auth.php");
?>
    <link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/signin.css">
</head>

<body>
    <a href="<?= $CURRENT_URL ?>/index.php">
        <img class="back" src="<?= $CURRENT_URL ?>/img/login/Back.svg" alt="">
    </a>

    <div style="display:inline-flexbox" class="Flex Full-height">

        <div style="display:inline-flexbox" id="register-container">
            <img src="<?= $CURRENT_URL ?>/img/login/titulo.svg" style="height:15px" alt="">
            <p class="title">Conecte-se ao <br> HiFashion</p>
            <div class="container-msg">
                <?php
                require_once("templates/message.php");
                ?>
            </div>
            <form action="<?= $CURRENT_URL ?>/process/auth_process.php" method="POST">
                <input type="hidden" name="type" value="login">
                <div class="form-group">
                    <label class="email" for="nickname_email">E-mail ou Apelido:</label>
                    <input type="text" class="form-input" id="nickname_email" name="nickname_email"
                        value="<?= $nickname_email ?>">
                </div>
                <div class="form-group flex-2">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-input" id="password" name="password"
                        value="<?= $password ?>">
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
        <div style="inline-block" class="visual Flex Full-height">
            <div class="visual-content Flex Full-height ">
                <img class="logo" src="<?= $CURRENT_URL ?>/img/login/logo.svg" style="width: 200px" alt="">
                <img class="txt" src="<?= $CURRENT_URL ?>/img/login/texto.png" style="width: 290px" alt="">
                <img class="foto" src="<?= $CURRENT_URL ?>/img/login/log1.png" style="width: 375px;" alt="">
            </div>
        </div>

    </div>
    <script src="<?= $CURRENT_URL ?>/script/message.js"></script>
</body>