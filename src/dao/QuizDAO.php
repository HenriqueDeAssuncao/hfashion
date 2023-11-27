<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../models/Quiz.php";
require_once __DIR__ . "/../models/Question.php";
require_once __DIR__ . "/../models/UserQuiz.php";
require_once __DIR__ . "/../models/Message.php";

class QuizDAO implements QuizDAOInterface
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
    public function buildQuiz($quiz, $UserQuiz = false)
    {
        if (!$UserQuiz) {
            $Quiz = new Quiz($this->message);
        } else {
            $Quiz = new UserQuiz($this->message);
        }

        $Quiz->setQuizId($quiz["quiz_id"]);
        $Quiz->setArticleId($quiz["article_id"]);
        $Quiz->setQuizName($quiz["quiz_name"]);
        $Quiz->setQuizDescription($quiz["quiz_description"]);
        $Quiz->setQuestionsNumber($quiz["questions_number"]);
        $Quiz->setQuestionWeight($quiz["question_weight"]);
        $Quiz->setQuizToken($quiz["quiz_token"]);
        $Quiz->setIconPath($quiz["icon"]);

        return $Quiz;
    }
    public function createQuiz(Quiz $quiz)
    {
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
    public function findQuizIdByToken($quizToken)
    {
        $stmt = $this->conn->prepare("SELECT quiz_id FROM quizzes WHERE quiz_token = :quiz_token");
        $stmt->bindParam(":quiz_token", $quizToken);
        $stmt->execute();
        $quizIdArr = $stmt->fetch(PDO::FETCH_ASSOC);
        $quizId = $quizIdArr["quiz_id"];
        return $quizId;
    }
    public function setQuizTokenToSession($quizToken)
    {
        $_SESSION["quizToken"] = $quizToken;
    }
    public function getQuizStatusByToken($quizToken)
    {
        $stmt = $this->conn->prepare("SELECT status FROM quizzes WHERE quiz_token = :quiz_token");
        $stmt->bindParam(":quiz_token", $quizToken);
        $stmt->execute();
        $statusDb = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($statusDb['status'] == 0) {
            $status = false;
        } else {
            $status = true;
        }

        return $status;
    }
    public function setQuizStatusToActive($quizId)
    {
        $stmt = $this->conn->prepare("UPDATE quizzes SET status = 1 WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();

        $this->update($quizId);

        $_SESSION["quizToken"] = "";
    }
    //ESSAS DUAS FUNÇÕES "getQuestionsNumber" e "update" deveriam ser triggers!
    public function getQuestionsNumber($quizId)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM questions WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
        $questionsNumber = $stmt->fetchColumn();
        return $questionsNumber;
    }
    public function update($quizId)
    {
        $questionsNumber = $this->getQuestionsNumber($quizId);
        $stmt = $this->conn->prepare("UPDATE quizzes SET questions_number = :questions_number WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":questions_number", $questionsNumber);
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
    }
    public function findUserQuizData($quizId, $userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users_answer_questions WHERE 
            quiz_id = :quiz_id and user_id = :user_id"
        );
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $userAnswerQuestion = $stmt->fetch(PDO::FETCH_ASSOC);
            $userQuizData = [];
            $userQuizData["quiz_status"] = $userAnswerQuestion["quiz_status"];
            $userQuizData["score"] = $userAnswerQuestion["score"];
            $userQuizData["score_portion"] = $userAnswerQuestion["score_portion"];
            $userQuizData["tries"] = $userAnswerQuestion["tries"];

            return $userQuizData;
        }
    }
    public function getQuiz($quizId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM quizzes WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
        $quiz = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = "";

        $Quiz = $this->buildQuiz($quiz);

        return $Quiz;
    }
    public function getQuizzes($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM quizzes WHERE status = 1");
        $stmt->execute();
        $quizzesArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = "";
        $UserQuizzes = [];
        foreach ($quizzesArray as $quiz) {
            $UserQuiz = $this->buildQuiz($quiz, true);
            $quizId = $UserQuiz->getQuizId();

            if ($userId) {
                $userQuizData = $this->findUserQuizData($quizId, $userId);

                if (isset($userQuizData)) {
                    $UserQuiz->setQuizStatus($userQuizData["quiz_status"]);
                    $UserQuiz->setScore($userQuizData["score"]);
                    $UserQuiz->setScorePortion($userQuizData["score_portion"]);
                    $UserQuiz->setTries($userQuizData["tries"]);
                }
            }

            $UserQuizzes[] = $UserQuiz;
        }

        return $UserQuizzes;
    }
    public function getQuestions($quizToken)
    {
        $quizId = $this->findQuizIdByToken($quizToken);

        $stmt = $this->conn->prepare("SELECT * FROM questions WHERE quiz_id = $quizId");
        $stmt->execute();
        $questionsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $questions = [];
        foreach ($questionsArray as $item) {
            $question = new Question($this->message);
            $question->setAnswer($item["answer"]);
            $question->setOptions($item["options"]);
            $question->setQuestion($item["question"]);
            $question->setImage($item["image"]);
            $question->setQuestionId($item["question_id"]);
            $questions[] = $question;
        }
        return $questions;

    }
    public function findQuizStatus($quizId)
    {
        $stmt = $this->conn->prepare("SELECT status FROM quizzes WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
        $quizStatus = $stmt->fetch(PDO::FETCH_ASSOC);
        return $quizStatus["status"];
    }
    public function attachToArticle($quizId, $articleId)
    {
        $stmt = $this->conn->prepare("UPDATE quizzes SET article_id = :article_id WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":article_id", $articleId);
        $stmt->bindParam(":quiz_id", $quizId);
        $stmt->execute();
    }
    public function findQuizByArticleId($articleId) {

        $stmt = $this->conn->prepare("SELECT * FROM quizzes WHERE article_id = :article_id");
        $stmt->bindParam(":article_id", $articleId);
        $stmt->execute();
        $QuizArray = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($QuizArray)) {
            $Quiz = $this->buildQuiz($QuizArray);
            return $Quiz;
        } else {
            return 0;
        }

    }
}