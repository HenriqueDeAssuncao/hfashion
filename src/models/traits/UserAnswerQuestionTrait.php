<?php
trait UserAnswerQuestionTrait
{
  private $userAnswerQuestionId;
  private $userId;
  private $quizId;
  private $quizStatus; //Se o usuário desbloqueou ou não o quiz
  private $score;
  private $tries;
  private $userAnswers;
  private $scorePortion;
  public function getUserId()
  {
    return $this->userId;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getQuizId()
  {
    return $this->quizId;
  }
  public function setQuizId($quizId)
  {
    $this->quizId = $quizId;
  }
  public function getQuizStatus()
  {
    return $this->quizStatus;
  }
  public function setQuizStatus($quizStatus)
  {
    $this->quizStatus = $quizStatus;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getTries()
  {
    return $this->tries;
  }
  public function setTries($tries)
  {
    $this->tries = $tries;
  }
  public function getUserAnswers() {
    return $this->userAnswers;
  }
  public function setUserAnswers($userAnswers) {
    $this->userAnswers = $userAnswers;
  }
  public function getScorePortion()
  {
    return $this->scorePortion;
  }
  public function setScorePortion($scorePortion)
  {
    $this->scorePortion = $scorePortion;
  }
}