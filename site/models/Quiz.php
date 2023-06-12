<?php
    class Quiz {
        private $quiz_id;
        private $quiz_name;
        private $question_weight;
        private $emblem;
        private $icon;
        private $avatars;
        private $tries;
        private $quiz_status;

        public function getQuizId() {
            return $this->quiz_id;
        }
        public function setQuizId($quiz_id) {
            $this->quiz_id = $quiz_id;
        }
        public function getQuestionWeight($question_weight) {
            return $this->$question_weight;
        }
        public function setQuestionWeight($question_weight) {
            $this->question_weight = $question_weight;
        }
        public function getEmblem($emblem) {
            return $this->$emblem;
        }
        public function setEmblem($emblem) {
            $this->emblem = $emblem;
        }
        public function getAvatars($avatars) {
            return $this->$avatars;
        }
        public function setAvatars($avatars) {
            $this->avatars = $avatars;
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
    }
    interface QuizDAOInterface {
        public function buildQuiz();
        public function createQuiz($quiz);
        public function getQuestionsByQuizId(); //Retorna um array com os objetos questions
    }