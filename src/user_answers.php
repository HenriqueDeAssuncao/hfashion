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
      $userAnswers = $userAnswerQuestion->getUserAnswersArray();
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

$i = 0;

?>

<link rel="stylesheet" href="<?=$CURRENT_URL?>/css/user_answers.css">

<a href="<?=$CURRENT_URL?>/dashboard.php"><img class="back-icon" src="<?= $CURRENT_URL ?>/img/dashboard/back-icon.svg" alt="ícone voltar"></a>

<div class="container-user-answers">

  <?php foreach($questions as $question):?>

    <div class="questions">

      <p class="p-question"><?=$question->getQuestion()?></p>
      
      <?php
        $options = $question->getOptionsArray();
      ?>
      
      <div class="options">

        <?php for($c=0; $c < count($options) ; $c++):?>
          <?php
              if($c == $userAnswers[$i]) {
                
                if($question->isAnswerCorrect($c)) {
                  $feedbackIcon = '<i class="fa-solid fa-check"></i>';
                  $feedbackClass = "green-txt";
                  $answerStatus = "correct";
                  $feedback = "Você acertou";
                } else {
                  $feedbackIcon = '<i class="fa-solid fa-xmark"></i>';
                  $feedbackClass = "red-txt";
                  $answerStatus = "wrong";  
                  $feedback = "Você errou";
                }

              } else {
                $feedbackIcon = '';
                $feedbackClass = "";
                $answerStatus = "";

                if($question->isAnswerCorrect($c)) {
                  $feedbackClass = "green-txt";
                  $answerStatus = "correct";  
                  $feedback = "";
                }
              }
    
          ?>
          <div class="options-container <?=$answerStatus?> Box-shadow">
            <div class="p-container Flex">
              <p class="p-options"><?=$options[$c]?> <?=$feedbackIcon?> </p>
            </div>
          </div>
        <?php endfor;?>
        
      </div>

      <p class="p-feedback <?=$feedbackClass?>">
        <?=$feedback?>
      </p>
      
      <?php
        $i++;
      ?>

    </div>

  <?php endforeach;?>
  
</div>

<?php 
require_once "templates/footer.php";
?>