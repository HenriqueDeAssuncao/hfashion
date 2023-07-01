<?php
    class UserAnswerQuestion { 
        private $userAnswerQuestionId;
        private $userId;
        private $quizId;
        private $quizStatus; //Se o usuário desbloqueou ou não o quiz
        private $score;
        private $tries;
        private $scorePortion;
        public function getUserId() {
            return $this->userId;
        }
        public function setUserId($userId) {
            $this->userId = $userId;
        }
        public function getQuizId() {
            return $this->quizId;
        }
        public function setQuizId($quizId) {
            $this->quizId = $quizId;
        }
        public function getQuizStatus() {
            return $this->quizStatus;
        }
        public function setQuizStatus($quizStatus) {
            $this->quizStatus = $quizStatus;
        }
        public function getScore() {
            return $this->score;
        }
        public function setScore($score) {
            $this->score = $score;
        }
        public function getTries() {
            return $this->tries;
        }
        public function setTries($tries) {
            $this->tries = $tries;
        }
        public function getScorePortion() {
            return $this->scorePortion;
        }
        public function setScorePortion($scorePortion) {
            $this->scorePortion = $scorePortion;
        }
        //Funções que não vão interagir com o banco
        public function increaseScore($questionWeight) {
            $this->score += $questionWeight;
        }
        public function updateTries() {
            if ($this->tries === 0) {
                $this->tries = 1;
            } else {
                $this->tries++;
            }
        }
    }
    interface UserAnswerQuestionDAOInterface {
        public function setStatusToAvailable(UserAnswerQuestion $userAnswerQuestion);
        public function verifyTries($userId, $quiz_id);
        public function isQuizAvailable($userId, $quizId);
        public function getTries($userId, $quiz_id);
        public function updateScore(UserAnswerQuestion $userAnswerQuestion);
        public function getUserQuizzesData($userId);
        public function findQuizRanking($quizId);
    }