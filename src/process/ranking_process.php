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

<style>

</style>

<?php foreach ($quizRanking as $userAnswerQuestion): ?>
    <div class="user-row">
        <div class="field">
            <img src="" alt="" style="width: 50px">
            <p><?= $userAnswerQuestion->getScore() ?></p>
            <p><?= $userAnswerQuestion->getNickname() ?></p>
        </div>
        <div class="field">
            <img src="<?= $userAnswerQuestion->getImage() ?>" alt="" style="width: 100px; border-radius: 100%" >
        </div>
    </div>
<?php endforeach; ?>