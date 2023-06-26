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
                    :user_id, :quiz_id, 1
                )");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
        }
        public function verifyTries($userId, $quizId) {
            $stmt = $this->conn->prepare("SELECT tries FROM users_answer_questions
                WHERE user_id = :user_id AND quiz_id = :quiz_id
            ");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
            $triesArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $tries = $triesArray["tries"];
            if ($tries == 2) {
                return false;
            } else {
                return true;
            }
        }
        public function isQuizAvailable($userId, $quizId) {
            $stmt = $this->conn->prepare("SELECT * FROM users_answer_questions
                WHERE user_id = :user_id AND quiz_id = :quiz_id AND quiz_status = 1
            ");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
            $usersAnswerQuestionsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($usersAnswerQuestionsArray)) {
                if ($this->verifyTries($userId, $quizId)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        public function getTries($userId, $quizId) {
            $stmt = $this->conn->prepare("SELECT tries FROM users_answer_questions 
                WHERE user_id = :user_id AND quiz_id = :quiz_id
            ");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();

            $triesArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $tries = $triesArray["tries"];
        
            if ($tries) {
                return $tries;
            } else {
                return 0;
            }
        }
        public function updateScore(UserAnswerQuestion $userAnswerQuestion) {
            if ($userAnswerQuestion->getScore()) {
                $score = $userAnswerQuestion->getScore();
            } else {
                $score = 0;
            }
            $scorePortion = $userAnswerQuestion->getScorePortion();
            $userId = $userAnswerQuestion->getUserId();
            $quizId = $userAnswerQuestion->getQuizId();
            $tries = $this->getTries($userId, $quizId);
            $finalTries = $tries + 1;

            $stmt = $this->conn->prepare("UPDATE users_answer_questions SET
                score = :score,
                tries = :tries,
                score_portion = :score_portion
                WHERE user_id = :user_id AND quiz_id = :quiz_id AND quiz_status = 1
            ");

            $stmt->bindParam(":score", $score);
            $stmt->bindParam(":tries", $finalTries);
            $stmt->bindParam(":score_portion", $scorePortion);
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":quiz_id", $quizId);
            
            $stmt->execute();
        }
        public function getUserQuizzesData($userId) {
            $stmt = $this->conn->prepare("SELECT * FROM users_answer_questions WHERE user_id = $userId");
            $stmt->execute();
            $userQuizzesDataArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $userQuizzesData = [];
            foreach ($userQuizzesDataArray as $item) {
                $userQuizData = new UserAnswerQuestion();
                $userQuizData->setUserId($item["user_id"]);
                $userQuizData->setQuizId($item["quiz_id"]);
                $userQuizData->setQuizStatus($item["quiz_status"]);
                $userQuizData->setScore($item["score"]);
                $userQuizData->setTries($item["tries"]);
                $userQuizData->setScorePortion($item["score_portion"]);

                $userQuizzesData[] = $userQuizData;
            }   
            return $userQuizzesData;
        }
    }