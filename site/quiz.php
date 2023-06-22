<?php
    require_once "templates/header.php";
    require_once "models/message.php";
    require_once "dao/QuizDAO.php";
    require_once "helpers/db.php";
    require_once "helpers/url.php";

    $message = new Message($CURRENT_URL);
    $quizDao = new QuizDAO($conn, $CURRENT_URL);

    if (!empty($_GET["token"])) {
        $quizToken = $_GET["token"];
        $quizId = $quizDao->findQuizIdByToken($quizToken);

        if ($quizId) {
            $questions = $quizDao->getQuestionsByQuizId($quizId);
            $questionsNumber = count($questions);
        }     
    } else {
        $message->setMessage("Página não encontrada", "error", "back");
    }

?>
    
<div class="container-question">
    <?php
        require_once "templates/question.php";
    ?>
</div>
    
<script src="<?=$CURRENT_URL?>/script/adm/questions.js"></script>
<?php
    require_once "templates/footer.php";
?>