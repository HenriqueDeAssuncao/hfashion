<?php

//Usuário e mensagem
require_once "templates/header.php";

//Usuário + Quiz
require_once "models/UserAnswerQuestion.php";
require_once "dao/UserAnswerQuestionDAO.php";
require_once "models/Question.php";
require_once "dao/QuizDAO.php";

//Usuário
$userData = $userDao->verifyToken(true);

//Pegando parâmetros da URL

if (!empty($_GET["quizToken"] && !empty($_GET["quizId"]))) {
  $quizToken = $_GET["quizToken"];
  $quizId = $_GET["quizId"];

  //Usuário + Quiz
  $quizDao = new QuizDAO($conn, $CURRENT_URL);
  $userAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);
  $userAnswerQuestion = $userAnswerQuestionDao->getUserAnswerQuestion($userId, $quizId);

  //Variáveis sobre o userAnswerQuestion que vou utilizar no desvio condicional
  if($userAnswerQuestion) {
    $tries = $userAnswerQuestion->getTries();
    $quizStatus = $userAnswerQuestion->getQuizStatus();

    if ($tries === 1) {
      $userAnswers = $userAnswerQuestion->getUserAnswers();
      $questions = $quizDao->getQuestions($quizToken);
    } else if ($tries === 0) {
      $message->setMessage("Conclua o quiz para ver suas respostas", "error", "back");
    }
  } else {
    $message->setMessage("Conclua o quiz para ver suas respostas", "error", "back");
  }

} else {
  $message->setMessage("Você não tem permissão para acessar essa página", "error", "back");
}

$i = 1;

?>

<a href="<?=$CURRENT_URL?>/dashboard.php"><img class="back-icon" src="<?= $CURRENT_URL ?>/img/dashboard/back-icon.svg" alt="ícone voltar"></a>

<div class="container-user-answers">

  <?php foreach($questions as $question):?>

    <?php
      $options = $question->getOptionsArray();
    ?>

    <p><?=$question->getQuestion()?></p>
    <hr>
    <?php foreach($options as $option):?>
      <p><?=$option?></p>
    <?php endforeach;?>

  <?php endforeach;?>
  
</div>

<?php 
require_once "templates/footer.php";
?>