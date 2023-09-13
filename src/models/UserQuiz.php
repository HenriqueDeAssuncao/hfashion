<?php

require_once "traits/QuizTrait.php";
require_once "traits/UserAnswerQuestionTrait.php";

class UserQuiz 
{
  use UserAnswerQuestionTrait;
  use QuizTrait;
}