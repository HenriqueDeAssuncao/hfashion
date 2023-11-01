<?php

//Usuário
require_once "templates/header.php";

//Emblemas
require_once "models/Emblem.php";
require_once "dao/EmblemDAO.php";
require_once "models/UserEmblem.php";
require_once "dao/UserEmblemDAO.php";

//Usuário + Quiz
require_once "models/UserQuiz.php";
require_once "dao/QuizDAO.php";

//Usuário
$userData = $userDao->verifyToken(true);

//Emblemas
$Emblem = new Emblem;
$EmblemDao = new EmblemDAO($conn, $CURRENT_URL);
$UserEmblemDao = new UserEmblemDAO($conn, $CURRENT_URL);
$userEmblems = $UserEmblemDao->findEmblems($userId, $EmblemDao);
$emblems = $EmblemDao->findAllEmblemsPaths();

//Usuário + Quiz
$quizDao = new QuizDAO($conn, $CURRENT_URL);
$UserQuiz = new UserQuiz($message);
$quizzes = $quizDao->getQuizzes($userId);

?>

<link rel="stylesheet" type="text/css" href="css/dashboard.css">

<section class="container-user">
    <div class="img-user profile-img" style="background-image: url('<?= $CURRENT_URL ?>/<?= $image ?>')" alt="Avatar do usuário"> </div>
    <div class="user-info">
        <div class="info-text">
            <p class="p-nickname"><?= $userData->getNickname() ?></p>
            <p class="p-email"><?= $userData->getEmail() ?></p>
            <a href="<?= $CURRENT_URL ?>/edit_profile.php" class="a-dashboard">editar perfil</a> 
            <p class="p-bio"><?= $userData->getBio() ?></p>
        </div>
        <div class="info-emblems Flex">
            <?php foreach ($userEmblems as $emblem): ?>
                <img src="<?= $CURRENT_URL ?>/<?= $emblem["emblem_path"] ?>" alt="Emblema <?= $emblem["emblem_name"] ?>" class="emblems">
            <?php endforeach; ?>
        </div>
    </div>
</secction>

<section class="container-quizzes-conquistas">
    <div class="quizzes">
        <h2>Quizzes</h2>
        <?php foreach ($quizzes as $quiz): ?>
            <div class="container-quiz">

                <img src="<?= $CURRENT_URL ?>/<?= $quiz->getIconPath() ?>" alt="ícone do quiz" class="icons">

                <div class="quiz-text">
                    <p class="p-quiz-name"><?= $quiz->getQuizName() ?></p>
                    <p>Veja suas respostas</p>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="conquistas">
        <h2>Conquistas</h2>
        <?php foreach ($quizzes as $quiz): ?>
            <!-- Calculo a largura da barra -->

            <?php
                $correctAnswers = intval($quiz->getScorePortion());
                $answers = $quiz->getQuestionsNumber();
                if ($correctAnswers && $answers) {
                    $barWidth = ($correctAnswers/$answers) * 100;
                } else {
                    $barWidth = 0;
                }
            ?>
        
            <div class="container-conquista">

                <div class="conquista-icon Flex">
                    <img src="<?= $CURRENT_URL ?>/<?= $quiz->getIconPath() ?>" alt="ícone do quiz" class="icons">
                </div>

                <div class="conquista-content">
                    <div class="content-text">
                        <p><?= $quiz->getQuizName() ?></p>
                        <p><?= $quiz->getScorePortion() ?></p>
                    </div>
                    <div class="content-bar-container">
                        <div class="bar" style="width: <?=$barWidth?>%">

                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="container-rankings">
    <div class="buttons-emblems">
        <?php foreach ($emblems as $emblem): ?>
            <button class="btn-emblems Button" value="<?= $emblem->getQuizId() ?>">
                <img src="<?= $CURRENT_URL ?>/<?= $emblem->getEmblemPath() ?>" alt="<?= $emblem->getEmblemName() ?>" class="emblems">
            </button>
        <?php endforeach; ?>
    </div>
    
    <div class="container-ranking">

    </div>
</section>

<script src="<?= $CURRENT_URL ?>/script/show_ranking.js"></script>

<?php
require_once("templates/footer.php");
?>