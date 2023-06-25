<?php
    require_once __DIR__ . "/../helpers/db.php";
    require_once __DIR__ . "/../models/Message.php";
    require_once __DIR__ . "/../models/UserAnswerQuestion.php";
    
    class UserAnswerQuestionDAO implements UserAnswerQuestionDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
        public function setStatusToAvailable(UserAnswerQuestion $userAnswerQuestion) {
            $userId = $userAnswerQuestion->getUserId();
            $quizId = $userAnswerQuestion->getQuizId();
            $quizStatus = $userAnswerQuestion->getQuizStatus();

            $stmt = $this->conn->prepare("INSERT INTO users_answer_questions (
                user_id, quiz_id, quiz_status
                ) VALUES (
                    :user_id, :quiz_id, :quiz_status
                )");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->bindParam(":quiz_status", $quizStatus);
            $stmt->execute();
        }
        public function updateScore(UserAnswerQuestion $userAnswerQuestion) {
            $userId = $userAnswerQuestion->getUserId();
            $quizId = $userAnswerQuestion->getQuizId();
            $score = $userAnswerQuestion->getScore();
            $tries = $userAnswerQuestion->getTries();

            $stmt = $this->conn->prepare("UPDATE users_answer_questions SET
                score = :score,
                tries = :tries
                WHERE user_id = :user_id and quiz_id = :quiz_id and quiz_status = 1
            ");

            $stmt->bindParam(":score", $score);
            $stmt->bindParam(":tries", $tries);
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_id", $quizId);
            
            $stmt->execute();
        }
    }