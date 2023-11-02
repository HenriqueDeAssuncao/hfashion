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
    <div class="container-img-user">
        <div class="img-user profile-img" style="background-image: url('<?= $CURRENT_URL ?>/<?= $image ?>')" alt="Avatar do usuário"> </div>
    </div>
    <div class="user-info">
        <div class="info-text">
            <p class="p-nickname"><?= $userData->getNickname() ?></p>
            <p class="p-email"><?= $userData->getEmail() ?></p>
            <a href="<?= $CURRENT_URL ?>/edit_profile.php" class="a-dashboard">editar perfil</a> 
            <p class="p-bio"><?= $userData->getBio() ?></p>
        </div>
        <div class="info-emblems">
            <?php foreach ($userEmblems as $emblem): ?>
                <img src="<?= $CURRENT_URL ?>/<?= $emblem["emblem_path"] ?>" alt="Emblema <?= $emblem["emblem_name"] ?>" class="emblems">
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="container-data">
    <section class="container-quizzes-conquistas">
        <h2>Quizzes</h2>
        <div class="quizzes">
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
            
        <h2>Acertos</h2>
        <div class="acertos">
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
    
                <div class="container-acertos">
    
                    <div class="acertos-icon Flex">
                        <img src="<?= $CURRENT_URL ?>/<?= $quiz->getIconPath() ?>" alt="ícone do quiz" class="icons">
                    </div>
    
                    <div class="acertos-content">
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
        <div class="buttons-emblems Flex">
            <!-- <button class="btn-emblems Button">
                <img src="<?= $CURRENT_URL ?>/img/dashboard/global.png" alt="Ícone global" class="emblems">
            </button> -->
            <?php foreach ($emblems as $emblem): ?>
                <button class="btn-emblems Button" value="<?= $emblem->getQuizId() ?>">
                    <img src="<?= $CURRENT_URL ?>/<?= $emblem->getEmblemPath() ?>" alt="<?= $emblem->getEmblemName() ?>" class="emblems">
                </button>
            <?php endforeach; ?>
        </div>
    
        <div class="container-ranking">
            <div class="ranking Auto">
    
            </div>
            <p class="p-rankig-name"> StreetWear </p>
            <div class="ranking Auto">
                <button class="ranking-row Button Flex">
                    <span>
                        <?= 1 ?>
                    </span>
                    <div class="Flex">
                        <div class="img-user-ranking profile-img"
                            style="background-image: url('<?= $image ?>')" alt="Avatar do usuário"> </div>
                        <p class="p-ranking-nickname"><?= $userData->getNickname() ?></p>
                    </div>
                    <p class="p-score">15 pontos</p>
                </button>
            </div>
            <div class="ranking Auto">
                <button class="ranking-row Button Flex">
                    <span>
                        <?= 1 ?>
                    </span>
                    <div class="Flex">
                        <div class="img-user-ranking profile-img"
                            style="background-image: url('<?= $image ?>')" alt="Avatar do usuário"> </div>
                        <p class="p-ranking-nickname"><?= $userData->getNickname() ?></p>
                    </div>
                    <p class="p-score">15 pontos</p>
                </button>
            </div>
            <div class="ranking Auto">
                <button class="ranking-row Button Flex">
                    <span>
                        <?= 1 ?>
                    </span>
                    <div class="Flex">
                        <div class="img-user-ranking profile-img"
                            style="background-image: url('<?= $image ?>')" alt="Avatar do usuário"> </div>
                        <p class="p-ranking-nickname"><?= $userData->getNickname() ?></p>
                    </div>
                    <p class="p-score">15 pontos</p>
                </button>
            </div>
            <div class="ranking Auto">
                <button class="ranking-row Button Flex">
                    <span>
                        <?= 1 ?>
                    </span>
                    <div class="Flex">
                        <div class="img-user-ranking profile-img"
                            style="background-image: url('<?= $image ?>')" alt="Avatar do usuário"> </div>
                        <p class="p-ranking-nickname"><?= $userData->getNickname() ?></p>
                    </div>
                    <p class="p-score">15 pontos</p>
                </button>
            </div>
            <div class="ranking Auto">
                <button class="ranking-row Button Flex">
                    <span>
                        <?= 1 ?>
                    </span>
                    <div class="Flex">
                        <div class="img-user-ranking profile-img"
                            style="background-image: url('<?= $image ?>')" alt="Avatar do usuário"> </div>
                        <p class="p-ranking-nickname"><?= $userData->getNickname() ?></p>
                    </div>
                    <p class="p-score">15 pontos</p>
                </button>
            </div>
        </div>
    
        <div class="container-btn-ranking Flex">
            <button class="btn-ranking js-hide Hidden Button Box-shadow">Voltar</button>
        </div>
    </section>
</section>

<div class="container-btn-ranking Flex Hidden">
    <button class="btn-ranking js-show Button Box-shadow">Consultar Ranking</button>
</div>

<script src="<?= $CURRENT_URL ?>/script/dashboard.js"></script>

<?php
require_once("templates/footer.php");
?>