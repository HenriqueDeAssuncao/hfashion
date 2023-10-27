<?php

require_once "templates/header.php";

require_once "models/Quiz.php";
require_once "dao/QuizDAO.php";
require_once "models/UserQuiz.php";
require_once "dao/QuestionDAO.php";


$quizDao = new QuizDAO($conn, $CURRENT_URL);
$UserQuiz = new UserQuiz($message);
$quizzes = $quizDao->getQuizzes($userId);

?>

<link rel="stylesheet" type="text/css" href="<?= $CURRENT_URL ?>/css/quizzes.css">

<!-- Corpo da página -->

<div id="main">
    <?php
    require_once("templates/message.php");
    ?>

    <div class="container-quiz-popup Container Hidden">

    </div>

    <div id="maintxt">
        <p id="maintitle">Complete os Quizzes</p>
        <p id="maintext">ganhe recompensas!</p>
    </div>

    <?php if (count($quizzes) > 0): ?>
        <?php foreach ($quizzes as $quiz): ?>
            <?php
            $status = $quiz->getQuizStatus();

            if ($status) {
                $imgStatus = "play.png";
            } else {
                $tries = $quiz->getTries();
                if ($tries >= 9) {
                    $imgStatus = "done.png";
                } else {
                    $imgStatus = "block.png";
                }
            }
            ?>

            <div class="topics">
                <a class="card" href="<?= $CURRENT_URL ?>/<?= $quizUrl ?>" data-parameter="<?= $quiz->getQuizId(); ?>">
                    <input class="quizId" type="hidden" value="<?= $quiz->getQuizId(); ?>">
                    <img class="image" src="<?= $CURRENT_URL ?>/<?= $quiz->getIconPath(); ?>" alt="Ícone do quiz">
                    <div class="icon">
                        <img class="status" src="<?= $CURRENT_URL ?>/img/quizzes/<?= $imgStatus ?>" alt="Ícone status do quiz">
                    </div>
                    <div class="text">
                        <p class="title">
                            <?= $quiz->getQuizName() ?>
                        </p>
                        <p class="quests">
                            <?= $quiz->getScorePortion() ?>
                        </p>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (count($quizzes) == 0): ?>
        <p>Não há quizzes para mostrar</p>
    <?php endif; ?>
</div>

<script src="<?= $CURRENT_URL ?>/script/quiz_popup.js"></script>

<?php
require_once "templates/footer.php";
?>