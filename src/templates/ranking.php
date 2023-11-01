<?php
if (!empty($_GET) && !empty($_GET["quizId"])) {
    $quizId = $_GET["quizId"];
    require_once __DIR__ . "/../helpers/db.php";
    require_once __DIR__ . "/../helpers/url.php";
    require_once __DIR__ . "/../models/UserAnswerQuestion.php";
    require_once __DIR__ . "/../dao/UserAnswerQuestionDAO.php";

    $UserAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);
    $quizRanking = $UserAnswerQuestionDao->findQuizRanking($quizId);
}
?>

<ol>
    <?php foreach ($quizRanking as $userAnswerQuestion): ?>
        <li>
            <div class="img-user-ranking profile-img" style="background-image: url('<?= $userAnswerQuestion->getImage() ?>')" alt="Avatar do usuário"> </div>
            <p><?= $userAnswerQuestion->getNickname()?></p>
        </li>
    <?php endforeach; ?>
</ol>