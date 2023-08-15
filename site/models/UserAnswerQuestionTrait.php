<?php
  trait UserAnswerQuestionTrait {
    private $userAnswerQuestionId;
    private $userId;
    private $quizId;
    private $quizStatus; //Se o usuário desbloqueou ou não o quiz
    private $score;
    private $tries;
    private $scorePortion;
  }