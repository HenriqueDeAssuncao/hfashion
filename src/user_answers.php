<?php

//Usuário
require_once "templates/header.php";

//Usuário + Quiz
require_once "models/UserQuiz.php";
require_once "dao/QuizDAO.php";

//Usuário
$userData = $userDao->verifyToken(true);

//Usuário + Quiz
$quizDao = new QuizDAO($conn, $CURRENT_URL);
$UserQuiz = new UserQuiz($message);
$quizzes = $quizDao->getQuizzes($userId);

?>

<a href="<?=$CURRENT_URL?>/dashboard.php"><img class="back-icon" src="<?= $CURRENT_URL ?>/img/dashboard/back-icon.svg" alt="ícone voltar"></a>

<div class="container-user-answers">
  
</div>

<?php
require_once "templates/footer.php";
?>


