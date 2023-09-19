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

<link rel="stylesheet" type="text/css" href="<?=$CURRENT_URL?>/css/quizzes.css">

<!-- Corpo da página -->

<div id="main">
    <?php
    require_once("templates/message.php");
    ?>

    <div id="maintxt">
        <p id="maintitle">Complete os Quizzes</p>
        <p id="maintext">ganhe recompensas!</p>
    </div>

    <?php if (count($quizzes) > 0): ?>
        <div id="topics">   
            <?php foreach ($quizzes as $quiz): ?>

                <?php
                    $tries = $quiz->getTries();
                    $status = $quiz->getQuizStatus();
                    if ($tries < 2) {
                        //Componentes da URL do quiz
                        $quizToken = $quiz->getQuizToken();
                        $questionsNumber = $quiz->getQuestionsNumber();
                        $questionWeight = $quiz->getQuestionWeight();

                        //Montando a URL do quiz
                        $quizUrl = "quiz.php?token=$quizToken&n=$questionsNumber&w=$questionWeight";
                        $imgStatus = "done.png";

                    } else {
                        $quizUrl = "";
                        $imgStatus = "block.png";
                    }
                ?>

                <?=$status?>

                <a class="card" href="<?= $CURRENT_URL ?>/<?= $quizUrl ?>">
                    <img id="image" src="<?= $CURRENT_URL ?>/<?= $quiz->getIconPath(); ?>">
                    <div id="icon">
                        <img id="status" src="<?= $CURRENT_URL ?>/img/quizzes/<?=$imgStatus?>"/>
                    </div>
                    <div id="text">
                        <p id="title"><?= $quiz->getQuizName() ?></p>
                        <p id="quests"><?= $quiz->getScorePortion() ?></p>
                    </div>
                </a>
             
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($quizzes) == 0): ?>
        <p>Não há quizzes para mostrar</p>
    <?php endif; ?>
</div>

<?php
require_once "templates/footer.php";
?>