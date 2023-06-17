<?php
    require_once __DIR__ . "/../models/Quiz.php";
    require_once __DIR__ . "/../models/Message.php";

    class QuizDAO implements QuizDAOInterface {
        public function buildQuiz() {

        }
        public function createQuiz($quiz) {
            echo $quiz->getIcon();
            echo "<br>";
            echo $quiz->getEmblem();
            echo "<br>";
        }
        public function getQuestionsByQuizId() {

        }
        public function getQuizRanking() {

        }
    }