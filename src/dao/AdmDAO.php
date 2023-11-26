<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../models/Quiz.php";
require_once __DIR__ . "/../models/Question.php";
require_once __DIR__ . "/../models/UserQuiz.php";
require_once __DIR__ . "/../models/Message.php";

class AdmDAO
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
    public function findQuizzes($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM quizzes WHERE user_id = :user_id");
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        $quizzesArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $AdmQuizzes = [];
        foreach ($quizzesArray as $quiz) {
            $Quiz = new Quiz($this->message);
            $Quiz->setQuizId($quiz["quiz_id"]);
            $Quiz->setQuizName($quiz["quiz_name"]);
            $Quiz->setQuizDescription($quiz["quiz_description"]);
            $Quiz->setQuestionsNumber($quiz["questions_number"]);
            $Quiz->setQuestionWeight($quiz["question_weight"]);
            $Quiz->setQuizToken($quiz["quiz_token"]);
            $Quiz->setIconPath($quiz["icon"]);
            $Quiz->setStatus($quiz["status"]);
            $Quiz->setArticleId($quiz["article_id"]);
            
            $AdmQuizzes[] = $Quiz;
        }

        return $AdmQuizzes;
    }

    public function findUnvailableArticles() {
        $stmt = $this->conn->prepare("SELECT article_id FROM quizzes");
        $stmt->execute();
        $articlesIdsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $articlesIds = [];
        foreach ($articlesIdsArray as $articleIdArray) {
            $articleId = $articleIdArray["article_id"];
            $articlesIds[] = $articleId;
        }
        return $articlesIds;
    }

    public function getAvailableIds($allArticlesIds) {
 
        $unavailableIds = $this->findUnvailableArticles();
        $availableIds = array_diff($allArticlesIds, $unavailableIds);

        sort($availableIds);

        return $availableIds;

    }

}