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

<div class="container-article-form Container Flex Hidden">

    <div class="form-content">

        <button class="btn-close-form Button">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="container-form Flex Auto">
            <div class="form">
            
            </div>
        </div>

    </div>

</div>

<div class="quizzes-container Auto">

    <?php foreach ($Quizzes as $Quiz): ?>
        
        <div class="quiz-container Flex Auto">
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
                        <p><?= $Quiz->getQuestionsNumber() ?> perguntas</p>
                        <p>Nível
                            <?= $Quiz->getQuestionWeight() ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="quiz-features">

                <button data-parameter="<?= $Quiz->getQuizId(); ?>" class="btn-settings Button">
                    <i class="fa-solid fa-gear"></i>
                </button>

                <div class="features Hidden">
                    <form action="process/adm_manage_quizzes.php" method="post">
                        <input type="hidden" name="type" value="questions">
                        <input type="hidden" name="quizId" value="<?= $Quiz->getQuizId() ?>">
                        <input type="hidden" name="quizToken" value="<?= $Quiz->getQuizToken() ?>">
                        <input type="submit" value="Adicionar perguntas" class="btn">
                    </form>
         
                    <button class="btn btn-add-form" data-parameter="<?= $Quiz->getQuizId() ?>">Relacionar com o artigo</button>
               
                    <form action="process/adm_manage_quizzes.php" method="post">
                        <input type="hidden" name="type" value="active">
                        <input type="hidden" name="article-id" value="<?= $Quiz->getArticleId() ?>">
                        <input type="hidden" name="quizId" value="<?= $Quiz->getQuizId() ?>">
                        <input type="submit" value="Ativar" class="btn">
                    </form>
                </div>

            </div>
            
        </div>

    <?php endforeach; ?>
</div>

<script src="<?= $CURRENT_URL ?>/script/index.js"></script>

<?php
require_once "templates/footer.php";
?>