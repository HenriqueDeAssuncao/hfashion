<?php
    class Question {
        private $question_id;
        private $quiz_id;
        private $question;
        private $options;
        private $answer;
        public function __construct($quiz_id) {
            $this->quiz_id = $quiz_id;
        }

        public function getQuestionId() {
            return $this->question_id;
        }
        public function setQuestionId($question_id) {
            $this->question_id = $question_id;
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