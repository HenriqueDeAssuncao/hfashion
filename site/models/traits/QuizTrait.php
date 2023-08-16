<?php
trait QuizTrait
{
  private $message;
  private $emblemId;
  private $quizToken; //Hash pra usar de url
  private $quizName;
  private $quizDescription;
  private $questionsNumber;
  private $questionWeight;
  private $iconPath;
  //Propriedades do UserAnswerQuestion
  private $quizStatus;
  private $scorePortion;
  private $tries;
  public function __construct(Message $message)
  {
    $this->message = $message;
  }
  public function getQuizToken()
  {
    return $this->quizToken;
  }
  public function setQuizToken($quizToken)
  {
    $this->quizToken = $quizToken;
  }
  public function getQuizName()
  {
    return $this->quizName;
  }
  public function setQuizName($quizName)
  {
    $this->quizName = $quizName;
  }
  public function getQuizDescription()
  {
    return $this->quizDescription;
  }
  public function setQuizDescription($quizDescription)
  {
    $this->quizDescription = $quizDescription;
  }
  public function getQuestionsNumber()
  {
    return $this->questionsNumber;
  }
  public function setQuestionsNumber($questionsNumber)
  {
    $this->questionsNumber = $questionsNumber;
  }
  public function getQuestionWeight()
  {
    return $this->questionWeight;
  }
  public function setQuestionWeight($questionWeight)
  {
    $this->questionWeight = $questionWeight;
  }
  public function getIconPath()
  {
    return $this->iconPath;
  }
  public function setIconPath($iconPath)
  {
    $this->iconPath = $iconPath;
  }
}