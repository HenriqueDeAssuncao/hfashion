<?php
    class Question {
        private $question_id;
        private $question_token; //Hash pra usar de url
        private $question;
        private $options;
        private $answer;
        public function getQuestionId() {
            return $this->question_id;
        }
        public function setQuestionId($question_id) {
            $this->question_id = $question_id;
        }
        public function getQuestionToken() {
            return $this->question_token;
        }
        public function setQuestionToken($question_token) {
            $this->question_token = $question_token;
        }
        public function getQuestion() {
            return $this->question;
        }
        public function setQuestion($question) {
            $this->question = $question;
        }
        public function getOptions() {
            return $this->options;
        }
        public function setOptions($options) {
            $this->options = $options;
        }
        public function getAnswer() {
            return $this->answer;
        }
        public function setAnswer($answer) {
            $this->answer = $answer;
        }

        //FUNÇÕES QUE NÃO VÃO INTERAGIR COM O BANCO
        public function isAnswerCorrect($userAnswer) {
            if ($userAnswer == $this->answer) {
                return true;
            }
            else {
                return false;
            }
        }
    }