<?php
require_once "templates/header.php";
require_once __DIR__ . "/../dao/AdmDAO.php";

$AdmDao = new AdmDAO($conn, $CURRENT_URL);
$Quizzes = $AdmDao->findQuizzes($userData->getId());
?>

<link rel="stylesheet" href="css/my_quizzes.css">

<?php
require_once __DIR__ . "/../templates/message.php";
?>

<div class="quizzes-container Flex">
    <?php foreach ($Quizzes as $Quiz): ?>
        <div class="quiz-container">
            <div class="quiz-content">
                <div class="up-side">
                    <div class="container-image" style="background-image: url(<?= $CURRENT_URL ?>/../<?= $Quiz->getIconPath() ?>); width: 110px; height: 70px" alt="Ícone do quiz">
        
                    </div>
                    <div class="text">
                        <p><?= $Quiz->getQuizName() ?></p>
                    </div>
                </div>
                <div class="down-side">
                    <p>5 perguntas</p>
                    <p>Nível <?= $Quiz->getQuestionWeight() ?></p>
                </div>
            </div>

            <div class="quiz-features">
                <form action="process/adm_manage_quizzes.php" method="post">
                    <input type="hidden" name="type" value="questions">
                    <input type="hidden" name="quizId" value="<?=$Quiz->getQuizId()?>">
                    <input type="submit" value="Adicionar perguntas" class="btn">
                </form>
                <form action="process/adm_manage_quizzes.php" method="post">
                    <input type="hidden" name="type" value="article">
                    <input type="hidden" name="quizId" value="<?=$Quiz->getQuizId()?>">
                    <input type="submit" value="Adicionar ao artigo" class="btn">
                </form>
                <form action="process/adm_manage_quizzes.php" method="post">
                    <input type="hidden" name="type" value="active">
                    <input type="hidden" name="quizId" value="<?=$Quiz->getQuizId()?>">
                    <input type="submit" value="Ativar" class="btn">
                </form>
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