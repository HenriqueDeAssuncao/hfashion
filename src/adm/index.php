<?php
require_once "templates/header.php";
require_once __DIR__ . "/../dao/AdmDAO.php";

$AdmDao = new AdmDAO($conn, $CURRENT_URL);
$Quizzes = $AdmDao->findQuizzes($userData->getId());
?>

<link rel="stylesheet" href="css/index.css">

<?php
require_once __DIR__ . "/../templates/message.php";
?>

<div class="quizzes-container Flex">

    <?php foreach ($Quizzes as $Quiz): ?>
        <div class="quiz-container Flex">
            <div class="quiz-content">
                <div class="up-side">
                    <div class="container-image profile-img"
                        style="background-image: url(<?= $CURRENT_URL ?>/../<?= $Quiz->getIconPath() ?>)"
                        alt="Ícone do quiz">

                    </div>
                    <div class="text">
                        <p>
                            <strong><?= $Quiz->getQuizName() ?></strong>
                        </p>
                    </div>
                </div>
                <div class="down-side">
                    <div class="container-down-side">
                        <p>5 perguntas</p>
                        <p>Nível
                            <?= $Quiz->getQuestionWeight() ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="quiz-features">

                <button class="btn-settings Button">
                    <i class="fa-solid fa-gear"></i>
                </button>

                <div class="features Hidden">
                    <form action="process/adm_manage_quizzes.php" method="post">
                        <input type="hidden" name="type" value="questions">
                        <input type="hidden" name="quizId" value="<?= $Quiz->getQuizId() ?>">
                        <input type="hidden" name="quizToken" value="<?= $Quiz->getQuizToken() ?>">
                        <input type="submit" value="Adicionar perguntas" class="btn">
                    </form>
                    <form action="process/adm_manage_quizzes.php" method="post">
                        <input type="hidden" name="type" value="article">
                        <input type="hidden" name="quizId" value="<?= $Quiz->getQuizId() ?>">
                        <input type="submit" value="Adicionar ao artigo" class="btn">
                    </form>
                    <form action="process/adm_manage_quizzes.php" method="post">
                        <input type="hidden" name="type" value="active">
                        <input type="hidden" name="quizId" value="<?= $Quiz->getQuizId() ?>">
                        <input type="submit" value="Ativar" class="btn">
                    </form>
                </div>

            </div>
            
        </div>

    <?php endforeach; ?>
</div>

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/global.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/../css/message.css">
<script src="<?= $CURRENT_URL ?>/../script/message.js"></script>
<script src="<?= $CURRENT_URL ?>/script/my_quizzes.js"></script>

<?php
require_once __DIR__ . "/../templates/footer.php";
?>