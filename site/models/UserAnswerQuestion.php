<?php
    class UserAnswerQuestion { 
        private $userAnswerQuestionId;
        private $questionWeight;
        private $quizStatus; //Se o usuário desbloqueou ou não o quiz
        private $score;
        private $tries;
        private $emblems;
        private $unlockedAvatars; //Aqui eu quero guardar os nomes das imagens desbloqueadas
        public function __construct($questionWeight) {
            $this->questionWeight = $questionWeight;
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
        public function getQuizStatus() {
            return $this->quizStatus;
        }
        public function setQuizStatus($quizStatus) {
            $this->quizStatus = $quizStatus;
        }
        public function increaseScore() {
            $this->score += $this->questionWeight;
        }
    }

    interface UserAnswerQuestionDAOInterface {
        public function setStatusToAvailable($quizId);
    }