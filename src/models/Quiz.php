<?php

require_once "traits/QuizTrait.php";

class Quiz
{
    use QuizTrait;

    private $quizId;
    private $userId;
    private $status;

    public function getQuizId()
    {
        return $this->quizId;
    }
    public function setQuizId($quizId)
    {
        $this->quizId = $quizId;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    //Funções que não vão interagir com o banco

    public function generateToken()
    {
        return bin2hex(random_bytes(25)); //Aqui estou criando a hash
    }
    public function verifyImg($image, $folder)
    {
        if ($image['error']) {
            $this->message->setMessage("Falha ao enviar a imagem $image", "error", "back");
            return;
        }
        $folder = $folder . "/";
        $imgName = $image['name'];
        $newImgName = uniqid();

        $imgType = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

        if ($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg") {
            $this->message->setMessage("Tipo de arquivo inválido! $image", "error", "back");
            return false;
        } else {
            $path = "img/system/" . $folder . $newImgName . "." . $imgType;
            return $path;
        }
    }

    function uploadImg($image, $path)
    {
        $pathString = "../../" . $path;
        $moveFile = move_uploaded_file($image["tmp_name"], $pathString);
        return $moveFile;
    }

}
interface QuizDAOInterface
{
    public function buildQuiz($quiz, $UserQuiz = false);
    public function createQuiz(Quiz $Quiz);
    public function findQuizIdByToken($quizToken);
    public function setQuizTokenToSession($quizToken);
    public function getQuizStatusByToken($quizToken);
    public function setQuizStatusToActive($quizId);
    public function getQuestionsNumber($quizId);
    public function update($quiz_id);
    public function findUserQuizData($quizId, $userId);
    public function getQuiz($quizId);
    public function getQuizzes($userId);
    public function getQuestions($quizToken); //Retorna um array com os objetos questions
    public function findQuizStatus($quizId);
    public function attachToArticle($quizId, $articleId);
}