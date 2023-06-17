<?php
    class Quiz {
        private $quiz_id;
        private $quiz_token; //Hash pra usar de url
        private $quiz_name;
        private $quiz_description;
        private $question_weight;
        private $icon;

        public function getQuizId() {
            return $this->quiz_id;
        }
        public function setQuizId($quiz_id) {
            $this->quiz_id = $quiz_id;
        }
        public function getQuizToken() {
            return $this->quiz_token;
        }
        public function setQuizToken($quiz_token) {
            $this->quiz_token = $quiz_token;
        }
        public function setQuizName($quiz_name) {
            $this->quiz_name = $quiz_name;
        }
        public function getQuizName() {
            return $this->quiz_name;
        }
        public function setQuizDescription($quiz_description) {
            $this->quiz_description = $quiz_description;
        }
        public function getQuizDescription() {
            return $this->quiz_description;
        }
        public function getQuestionWeight($question_weight) {
            return $this->$question_weight;
        }
        public function setQuestionWeight($question_weight) {
            $this->question_weight = $question_weight;
        }
        public function getIcon($icon) {
            return $this->$icon;
        }
        public function setIcon($icon) {
            $this->icon = $icon;
        }

    }
    interface QuizDAOInterface {
        public function buildQuiz();
        public function createQuiz($quiz);
        public function getQuestionsByQuizId(); //Retorna um array com os objetos questions
        public function getQuizRanking();
    }