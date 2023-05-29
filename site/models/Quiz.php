<?php
    class Quiz {
        private $quiz_id;
        private $quiz_name;
        private $answers;
        private $question_weight;
        private $emblem;
        private $avatar;
        private $lives;

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

        public function getAnswers($answers) {
            return $this->$answers;
        }
        public function setAnswers($answers) {
            $this->answers = $answers;
        }

        public function getEmblem($emblem) {
            return $this->$emblem;
        }
        public function setEmblem($emblem) {
            $this->emblem = $emblem;
        }

        public function getAvatar($avatar) {
            return $this->$avatar;
        }
        public function setAvatar($avatar) {
            $this->avatar = $avatar;
        }

        public function getLives($lives) {
            return $this->$lives;
        }
        public function setLives($lives) {
            $this->lives = $lives;
        }

    }