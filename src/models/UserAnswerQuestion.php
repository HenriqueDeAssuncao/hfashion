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
}
interface UserAnswerQuestionDAOInterface
{
    public function setStatusToAvailable(UserAnswerQuestion $userAnswerQuestion);
    public function isQuizAvailable($userId, $quizId);
    public function updateScore(UserAnswerQuestion $userAnswerQuestion);
    public function findUser($userId);
    public function findQuizName($quizId);
    public function findQuizRanking($quizId);
    public function findGlobalRanking();
    public function sortQuizRanking($quizRanking);
}