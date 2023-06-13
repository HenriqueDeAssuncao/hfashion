<?php
    class UserAnswerQuestion {
        private $user_answer_question_id;
        private $score;
        private $question_weight;
        public function __construct($question_weight) {
            $this->question_weight = $question_weight;
        }
        public function increaseScore() {
            $this->score += $this->score;
        }
    }