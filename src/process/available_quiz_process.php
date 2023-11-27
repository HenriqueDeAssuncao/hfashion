<?php

require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/message.php";
require_once __DIR__ . "/../models/UserAnswerQuestion.php";
require_once __DIR__ . "/../dao/UserAnswerQuestionDAO.php";

$Message = new Message($CURRENT_URL);

if (!empty($_POST)) {

  $userId = $_POST["userId"];
  $quizId = $_POST["quizId"];
  $quizName = $_POST["quizName"];


  $userAnswerQuestion = new UserAnswerQuestion();
  $userAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);

  if (!$userAnswerQuestionDao->isQuizAvailable($userId, $quizId)) {

    $userAnswerQuestion->setUserId($userId);
    $userAnswerQuestion->setQuizId($quizId);
  
    $userAnswerQuestionDao->setStatusToAvailable($userAnswerQuestion);
  
    $Message->setMessage("Parabéns! Você desbloqueou o quiz $quizName.", "success", "quizzes.php");

  } else {

    header("Location: $CURRENT_URL/../index.php");

  }
 
} else {
  $Message->setMessage("Página indisponível", "error", "back");
}