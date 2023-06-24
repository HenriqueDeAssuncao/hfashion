<?php
    class Question {
        private $questionId;
        private $quizId;
        private $question;
        private $options;
        private $answer;
        public function __construct($quizId) {
            $this->quizId = $quizId;
        }

        public function getQuizId() {
            return $this->quizId;
        }
        public function getQuestionId() {
            return $this->questionId;
        }
        public function setQuestionId($questionId) {
            $this->questionId = $questionId;
        }
        public function getQuestion() {
            return $this->question;
        }
        public function setQuestion($question) {
            $this->question = $question;
        }
        public function getOptions() {
            $optionsArray = explode(",", $this->options);
            return $optionsArray;
        }
        public function setOptions($options) {
            $optionsString = implode(",", $options);
            $this->options = $optionsString;
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
        public function getOptionsArray() {
            $stringOptions = $this->getOptions();
            $options = explode(",", $stringOptions);
            return $options;
        }
    }

    interface QuestionDAOInterface {
        public function createQuestion(Question $question);
    }