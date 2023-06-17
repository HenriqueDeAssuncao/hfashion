<?php
    class UserAnswerQuestion { 
        private $question_weight;
        private $user_answer_question_id;
        private $quiz_status; //Se o usuário desbloqueou ou não o quiz
        private $score;
        private $tries;
        private $emblems;
        private $unlockedAvatars; //Aqui eu quero guardar os nomes das imagens desbloqueadas
        public function __construct($question_weight) {
            $this->question_weight = $question_weight;
        }
        public function getTries($tries) {
            return $this->$tries;
        }
        public function setTries($tries) {
            $this->tries = $tries;
        }
        public function getQuizStatus($quiz_status) {
            return $this->$quiz_status;
        }
        public function setQuizStatus($quiz_status) {
            $this->quiz_status = $quiz_status;
        }
        public function increaseScore() {
            $this->score += $this->question_weight;
        }
    }

    interface UserAnswerQuestionDAOInterface {

    }