<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../models/Message.php";
require_once __DIR__ . "/../models/UserAnswerQuestion.php";
require_once __DIR__ . "/../models/User.php";

class UserAnswerQuestionDAO implements UserAnswerQuestionDAOInterface
{
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }
    public function setStatusToAvailable(UserAnswerQuestion $userAnswerQuestion)
    {
        $userId = $userAnswerQuestion->getUserId();
        $quizId = $userAnswerQuestion->getQuizId();

        $stmt = $this->conn->prepare("INSERT INTO users_answer_questions (
                user_id, quiz_id, quiz_status
                ) VALUES (
                    :user_id, :quiz_id, 1
                )");
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
    }
    public function verifyTries($userId, $quizId)
    {
        $stmt = $this->conn->prepare("SELECT tries FROM users_answer_questions
                WHERE user_id = :user_id AND quiz_id = :quiz_id
            ");
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
        $triesArray = $stmt->fetch(PDO::FETCH_ASSOC);
        $tries = $triesArray["tries"];
        if ($tries == 20) {
            return false;
        } else {
            return true;
        }
    }
    public function isQuizAvailable($userId, $quizId)
    {
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
    public function getTries($userId, $quizId)
    {
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
    public function updateScore(UserAnswerQuestion $userAnswerQuestion)
    {
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
    public function findUser($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $data = $stmt->fetch();

        $user = new User();

        $user->setId($data["id"]);
        $user->setNickname($data["nickname"]);
        $user->setEmail($data["email"]);
        $user->setPassword($data["password"]);
        $user->setImage($data["image"]);
        $user->setBio($data["bio"]);
        $user->setToken($data["token"]);

        return $user;
    }
    public function findQuizRanking($quizId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users_answer_questions WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
        $quizRankingArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $quizRanking = [];
        foreach ($quizRankingArray as $item) {
            $UserAnswerQuestion = new UserAnswerQuestion;
            $UserAnswerQuestion->setQuizId($item["quiz_id"]);
            $UserAnswerQuestion->setUserId($item["user_id"]);
            $UserAnswerQuestion->setScore($item["score"]);
            $UserAnswerQuestion->setScorePortion($item["score_portion"]);
            $UserAnswerQuestion->setTries($item["tries"]);
            $UserAnswerQuestion->setQuizStatus($item["quiz_status"]);

            //Junto com os objetos dos usuários
            $User = $this->findUser($item["user_id"]);

            $nickname = $User->getNickname();
            $image = $User->getImage();
            $email = $User->getEmail();

            $UserAnswerQuestion->setNickname($nickname);
            $UserAnswerQuestion->setImage($image);
            $UserAnswerQuestion->setEmail($email);
            $quizRanking[] = $UserAnswerQuestion;
        }

        return $quizRanking;
    }
    public function getUserQuizData($userId)
    {
        
    }
}