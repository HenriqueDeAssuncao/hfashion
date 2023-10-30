<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../dao/QuizDAO.php";

$QuizDao = new QuizDAO($conn, $CURRENT_URL);

if (!empty($_GET)) {
  $index = $_GET["index"];
  $Quiz = $QuizDao->getQuiz($index);
  //Componentes da URL do quiz
  $quizToken = $Quiz->getQuizToken();
  $questionsNumber = $Quiz->getQuestionsNumber();
  $questionWeight = $Quiz->getQuestionWeight();

  //Montando a URL do quiz
  $quizUrl = "quiz.php?token=$quizToken&n=$questionsNumber&w=$questionWeight";

}
?>

<a href="<?= $CURRENT_URL ?>/../quizzes.php" class="icon-popup">
  <img src="<?= $CURRENT_URL ?>/../img/quizzes/exit.png" alt="Ícone fechar" class="status-popup">
</a>
<div class="mainimage-popup">
  <img class="image-popup" src="<?= $CURRENT_URL ?>/../<?= $Quiz->getIconPath(); ?>" alt="Ícone do quiz">
</div>
<div class="text-popup">
  <p class="level-popup">Nível
    <?= $Quiz->getQuestionWeight(); ?>
  </p>
  <p class="title-popup">
    <?= $Quiz->getQuizName() ?>
  </p>
  <p class="description-popup">
    <?= $Quiz->getQuizDescription() ?>
  </p>
</div>
<div class="button-popup">
  <a class="start" href="<?= $CURRENT_URL ?>/../<?= $quizUrl ?>">
    Começar
  </a>
</div>