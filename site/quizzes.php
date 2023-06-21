<?php
    require_once "templates/header.php";
    require_once "dao/QuizzesDAO.php";
    require_once "helpers/url.php";
    require_once "models/Message.php";

    require_once "models/Quiz.php";

    require_once "models/Question.php";
    require_once "dao/QuestionDAO.php";

    $message = new Message($CURRENT_URL);
    $quizzesDao = new QuizzesDAO($conn, $CURRENT_URL, $message);
    $quizzes = $quizzesDao->getQuizzes();
?>
    <style>
        img {
            width: 100px;
        }
    </style>

    <!-- Corpo da página -->

    <?php if(count($quizzes) > 0):?>
        <?php foreach ($quizzes as $quiz):?>
            <button class="btn-quiz-box">
                <a href="<?=$CURRENT_URL?>/quiz.php?token=<?=$quiz->getQuizToken()?>">
                    <div class="quiz-box">
                        <p><?=$quiz->getQuizName()?></p>
                        <img src="<?=$CURRENT_URL?>/<?=$quiz->getIconPath()?>" alt="">
                    </div>
                </a>
            </button>
        <?php endforeach;?>
    <?php endif;?>


    

<?php
    require_once "templates/footer.php";
?>


