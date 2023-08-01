<?php
    if (!empty($_GET) && !empty($_GET["quizId"])) {
        $quizId = $_GET["quizId"];
        require_once __DIR__ . ("/../helpers/db.php");
        require_once __DIR__ . ("/../helpers/url.php");
        require_once __DIR__ . ("/../models/UserAnswerQuestion.php");
        require_once __DIR__ . ("/../dao/UserAnswerQuestionDAO.php");

        $UserAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);
        $quizRanking = $UserAnswerQuestionDao->findQuizRanking($quizId);
    }
?>

<?php foreach($quizRanking as $UserAnswerQuestion):?>
    <?php
        echo "<br>";
        $user = $UserAnswerQuestionDao->findUser($UserAnswerQuestion->getUserId());
    ?>
    <p><?=$UserAnswerQuestion->getScore()?></p>
    <p><?=$user->getNickname()?></p>
    <span>
        <img src="<?=$user->getImage()?>" alt="" style="width='40px'">
    </span>
    
<?php endforeach;?>