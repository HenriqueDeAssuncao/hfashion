<?php

require_once "traits/UserTrait.php";
require_once "traits/UserAnswerQuestionTrait.php";

class UserAnswerQuestion
{
    use UserTrait;
    use UserAnswerQuestionTrait;

    //Funções que não vão interagir com o banco
    public function increaseScore($questionWeight)
    {
        $this->score += $questionWeight;
    }
    public function updateTries()
    {
        if ($this->tries === 0) {
            $this->tries = 1;
        } else {
            $this->tries++;
        }
    }
}
interface UserAnswerQuestionDAOInterface
{
    public function setStatusToAvailable(UserAnswerQuestion $userAnswerQuestion);
    public function verifyTries($userId, $quiz_id);
    public function isQuizAvailable($userId, $quizId);
    public function getTries($userId, $quiz_id);
    public function updateScore(UserAnswerQuestion $userAnswerQuestion);
    public function findUser($userId);
    public function findQuizName($quizId);
    public function findQuizRanking($quizId);
    public function sortQuizRanking($quizRanking);
}