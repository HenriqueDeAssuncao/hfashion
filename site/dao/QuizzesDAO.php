<?php

require_once __DIR__ . "/../models/Quiz.php";
require_once __DIR__ . "/../models/Question.php";

    class QuizzesDAO  {
        private $conn;
        private $url;
        private $message;
        private $quiz;

        public function __construct(PDO $conn, $url, $message) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = $message;
        }
        
        public function findQuizTokenByEmblem($emblem) {

        }
        public function findQuizTokenByIcon($icon) {

        }
        public function getQuizzes() {
            $stmt = $this->conn->prepare("SELECT * FROM quizzes WHERE status = 1");
            $stmt->execute();
            $quizzesArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $quizzes = [];
            foreach($quizzesArray as $item) {
                $quiz = new Quiz($this->message);
                $quiz->setQuizId($item["quiz_id"]);
                $quiz->setQuizName($item["quiz_name"]);
                $quiz->setQuizDescription($item["quiz_description"]);
                $quiz->setQuizToken($item["quiz_token"]);
                $quiz->setIconPath($item["icon"]);
                $quizzes[] = $quiz;
            }
            return $quizzes;
        }
        public function getGlobalRanking() {
            
        }
    }