<body>
    <header>
        <div class="Container">
            <nav class="nav Flex">
                <div class="nav-icons">
                    <button class="btn-hamburguer Transparent Button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <button class="btn-close Button Hidden">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="nav-1 Hidden">
                    <ul class="links-nav-1">
                        <li class="links logo">
                            <a href="<?= $CURRENT_URL ?>/">
                                <img class="logo-desktop" src="<?= $CURRENT_URL ?>/img/" alt="Hfashion"
                                    style="width: 100px">
                            </a>
                        </li>

                        <li class="links"><a class="White" href="<?= $CURRENT_URL ?>/dashboard.php"><i
                                    class="fa-solid fa-chart-simple"></i>Dashboard</a></li>

                        <li class="links"><a class="White" href="<?= $CURRENT_URL ?>/quizzes.php"><i
                                    class="fa-solid fa-lightbulb"></i>Quizzes</a></li>

                        <?php if ($userData): ?>
                            <?php if ($Adm->isAdm($userDao, false)): ?>
                                <li class="links"><a class="White" href="<?= $CURRENT_URL ?>/adm/"><i
                                            class="fa-solid fa-gear"></i>Gerenciar</a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                    </ul>
                </div>

                <a href="<?= $CURRENT_URL ?>"><img src="<?= $CURRENT_URL ?>/img/header/logo-mobile.png" alt="Hifashion"
                        class="logo-mobile" style="width: 40px"></a>

                <div class="nav-2">
                    <button class="btn-dropdown Button">
                        <div class="profile-pic-header profile-img"
                            style="background-image: url(<?= $CURRENT_URL ?>/<?= $image ?>)" alt="Foto de Perfil"></div>
                    </button>
                    <div class="dropdown-rect Hidden">
                        <div class="dropdown-tri">

                        </div>
                        <ul class="links-nav-2">
                            <?php if (!empty($userData)): ?>
                                <li><i class="fa-sharp fa-solid fa-user-pen"></i><a class="links"
                                        href="<?= $CURRENT_URL ?>/edit_profile.php">Editar Perfil</a></li>
                                <li><i class="fa-solid fa-right-from-bracket"></i><a class="links"
                                        href="<?= $CURRENT_URL ?>/process/logout_process.php">Sair</a></li>
                            <?php endif; ?>
                            <?php if (empty($userData)): ?>
                                <li><a class="links" href="<?= $CURRENT_URL ?>/signin.php">Entrar</a></li>
                                <li><a class="links" href="<?= $CURRENT_URL ?>/signup.php">Cadastrar</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="Container">