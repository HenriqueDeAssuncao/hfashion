<?php
    class Question {
        private $question_id;
        private $question;
        private $options;
        private $answer;
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
    }