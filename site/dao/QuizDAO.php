<?php
    require_once __DIR__ . "/../helpers/db.php";
    require_once __DIR__ . "/../models/Quiz.php";
    require_once __DIR__ . "/../models/Question.php";
    require_once __DIR__ . "/../models/Message.php";

    class QuizDAO implements QuizDAOInterface {
        private $conn;
        private $url;
        private $message;
        private $quiz;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
        public function buildQuiz() {

        }
        public function createQuiz(Quiz $quiz) {
            $userId = $quiz->getUserId();
            $quizName = $quiz->getQuizName();
            $quizDescription = $quiz->getQuizDescription();
            $questionWeight = $quiz->getQuestionWeight();
            $iconPath = $quiz->getIconPath();
            $quizToken = $quiz->getQuizToken();

            $stmt = $this->conn->prepare("INSERT INTO quizzes (
                user_id, quiz_name, quiz_description, question_weight, icon, quiz_token, status
                ) VALUES (
                    :user_id, :quiz_name, :quiz_description, :question_weight, :icon, :quiz_token, 0
                )");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_name", $quizName);
            $stmt->bindParam(":quiz_description", $quizDescription);
            $stmt->bindParam(":question_weight", $questionWeight);
            $stmt->bindParam(":icon", $iconPath);
            $stmt->bindParam(":quiz_token", $quizToken);
            $stmt->execute();

        }
        public function findQuizIdByToken($quizToken) {
            $stmt = $this->conn->prepare("SELECT quiz_id FROM quizzes WHERE quiz_token = :quiz_token");
            $stmt->bindParam(":quiz_token", $quizToken);
            $stmt->execute();
            $quizIdArr = $stmt->fetch(PDO::FETCH_ASSOC);
            $quizId = $quizIdArr["quiz_id"];
            return $quizId;
        }
        public function setQuizTokenToSession($quizToken) {
            $_SESSION["quizToken"] = $quizToken;
        }
        public function getQuizStatusByToken($quizToken) {
            $stmt = $this->conn->prepare("SELECT status FROM quizzes WHERE quiz_token = :quiz_token");
            $stmt->bindParam(":quiz_token", $quizToken);
            $stmt->execute();
            $statusDb = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($statusDb['status'] == 0) {
                $status = false;
            }
            else {
                $status = true;
            }

            return $status;
        }
        public function setQuizStatusToActive($quizId) {
            $stmt = $this->conn->prepare("UPDATE quizzes SET status = 1 WHERE quiz_id = :quiz_id");
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();

            $_SESSION["quizToken"] = "";
        }
        public function getQuestionsByQuizId() {

        }
        public function getQuizRanking() {

        }
    }