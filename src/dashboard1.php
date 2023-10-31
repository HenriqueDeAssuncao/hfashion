<?php

//Usuário
require_once "templates/header.php";

//Emblemas
require_once "models/Emblem.php";
require_once "dao/EmblemDAO.php";
require_once "models/UserEmblem.php";
require_once "dao/UserEmblemDAO.php";

//Usuário + Quiz
require_once "dao/QuizDAO.php";
require_once "dao/UserQuizDAO.php";

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

<div class="container-user">
    <div class="img-user profile-img" style="background-image: url('<?= $CURRENT_URL ?>/<?= $userData->getImage() ?>')" alt="Avatar do usuário">

    </div>
    <div class="user-info">
        <div class="info-text">
            <p class="p-nickname"><?=$userData->getNickname()?></p>
            <a href="<?=$CURRENT_URL?>/edit_profile.php">Editar perfil</a>
            <p class="p-email"><?=$userData->getEmail()?></p>
            <p class="p-bio"><?=$userData->getBio()?></p>
        </div>
        <div class="info-emblems">
            <?php foreach ($userEmblems as $emblem):?>
                <img src="<?= $CURRENT_URL ?>/<?= $emblem["emblem_path"] ?>" alt="Emblema <?= $emblem["emblem_name"] ?>" class="emblems">
            <?php endforeach;?>
        </div>
    </div>
</div>

<div class="content">
    <div>
        <div class="container-quizzes">
            <?php foreach ($quizzes as $quiz): ?>
                <div class="container-quiz">
                    <img src="<?=$CURRENT_URL?>/" alt="" class="img-quiz">
                    <div class="quiz-text">
                    <p class="p-quiz-name"><?=$quiz->getQuizName()?></p>
                    <p>Veja suas respostas</p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        
        <div class="conquistas">
        
        </div>
    </div>
    
    <div class="container-rankings">
    
    </div>
</div>

<script src="<?= $CURRENT_URL ?>/script/show_ranking.js"></script>

<?php
require_once("templates/footer.php");
?>