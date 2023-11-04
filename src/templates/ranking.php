<?php
if (!empty($_GET) && !empty($_GET["quizId"])) {
    $quizId = $_GET["quizId"];
    require_once __DIR__ . "/../helpers/db.php";
    require_once __DIR__ . "/../helpers/url.php";
    require_once __DIR__ . "/../models/UserAnswerQuestion.php";
    require_once __DIR__ . "/../dao/UserAnswerQuestionDAO.php";

    $UserAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);

    if ($quizId == "global") {
        $quizRanking = $UserAnswerQuestionDao->findGlobalRanking();
        $quizName = "Ranking Global";
    } else {
        $quizRanking = $UserAnswerQuestionDao->findQuizRanking($quizId);
        $quizName = $UserAnswerQuestionDao->findQuizName($quizId);
    }
    
}

$counter = 1;

?>

<p class="p-rankig-name"> <?= $quizName ?> </p>

<?php foreach ($quizRanking as $userAnswerQuestion): ?>
    <div class="ranking js-ranking Auto">
        <button class="ranking-row Button Flex">
            <span class="number">
                <?= $counter ?>
            </span>
            <div class="Flex">
                <div class="img-user-ranking profile-img"
                    style="background-image: url('<?= $userAnswerQuestion->getImage() ?>')" alt="Avatar do usuário"> </div>
                <p class="p-ranking-nickname"><?= $userAnswerQuestion->getNickname() ?></p>
            </div>
            <p class="p-score"><?= $userAnswerQuestion->getScore() ?> pontos</p>
        </button>
    </div>

    <?php
    $counter++;
?>
<?php endforeach; ?>