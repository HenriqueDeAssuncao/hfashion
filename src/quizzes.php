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
<style>
    img {
        width: 100px;
    }
</style>

<!-- Corpo da página -->

<?php
require_once("templates/message.php");
?>

<?php if (count($quizzes) > 0): ?>
    <?php foreach ($quizzes as $quiz): ?>
        <button class="btn-quiz-box">
            <a
                href="<?= $CURRENT_URL ?>/quiz.php?token=<?= $quiz->getQuizToken() ?>&n=<?= $quiz->getQuestionsNumber() ?>&w=<?= $quiz->getQuestionWeight() ?>">
                <div class="quiz-box">
                    <p>
                        <?= $quiz->getQuizName() ?>
                    </p>
                    <img src="<?= $CURRENT_URL ?>/<?= $quiz->getIconPath() ?>" alt="">
                    <p>
                        Pontuação:
                        <?= $quiz->getScore() ?>
                    </p>
                    <p>
                        Acertos:
                        <?= $quiz->getScorePortion() ?>
                    </p>
                    <p>
                        Tentativas:
                        <?= $quiz->getTries() ?>
                    </p>
                </div>
            </a>
        </button>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (count($quizzes) == 0): ?>
    <p>Não há quizzes para mostrar</p>
<?php endif; ?>

<?php
require_once "templates/footer.php";
?>