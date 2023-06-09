<?php
    class Quiz {
        private $message;
        private $quizId;
        private $userId;
        private $emblemId;
        private $quizToken; //Hash pra usar de url
        private $quizName;
        private $quizDescription;
        private $status;
        private $questionsNumber;
        private $questionWeight;
        private $iconPath;
        //Propriedades do UserAnswerQuestion
        private $quizStatus;
        private $scorePortion;
        private $tries;
        public function __construct(Message $message) {
            $this->message = $message;
        }
        public function getQuizId() {
            return $this->quizId;
        }
        public function setQuizId($quizId) {
            $this->quizId = $quizId;
        }
        public function getUserId() {
            return $this->userId;
        }
        public function setUserId($userId) {
            $this->userId = $userId;
        }
        public function getQuizToken() {
            return $this->quizToken;
        }
        public function setQuizToken($quizToken) {
            $this->quizToken = $quizToken;
        }
        public function getQuizName() {
            return $this->quizName;
        }
        public function setQuizName($quizName) {
            $this->quizName = $quizName;
        }
        public function getQuizDescription() {
            return $this->quizDescription;
        }
        public function setQuizDescription($quizDescription) {
            $this->quizDescription = $quizDescription;
        }
        public function getStatus() {
            return $this->status;
        }
        public function setStatus($status) {
            $this->status = $status;
        }
        public function getQuestionsNumber() {
            return $this->questionsNumber;
        }
        public function setQuestionsNumber($questionsNumber) {
            $this->questionsNumber = $questionsNumber;
        }
        public function getQuestionWeight() {
            return $this->questionWeight;
        }
        public function setQuestionWeight($questionWeight) {
            $this->questionWeight = $questionWeight;
        }
        public function getIconPath() {
            return $this->iconPath;
        }
        public function setIconPath($iconPath) {
            $this->iconPath = $iconPath;
        }
        //Funções do UserAnswerQuestion
        public function getQuizStatus() {
            return $this->quizStatus;
        }
        public function setQuizStatus($quizStatus) {
            $this->quizStatus = $quizStatus;
        }
        public function getTries() {
            return $this->tries;
        }
        public function setTries($tries) {
            $this->tries = $tries;
        }
        public function getScorePortion() {
            return $this->scorePortion;
        }
        public function setScorePortion($scorePortion) {
            $this->scorePortion = $scorePortion;
        }

        //Funções que não vão interagir com o banco

        public function generateToken() {
            return bin2hex(random_bytes(50)); //Aqui estou criando a hash
        }
        public function verifyImg($image, $folder) {
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

        function uploadImg($image, $path) {
            $pathString = "../" . $path;
            $moveFile = move_uploaded_file($image["tmp_name"], $pathString);
            return $moveFile;
        }

    }
    interface QuizDAOInterface {
        public function buildQuiz();
        public function createQuiz(Quiz $quiz);
        public function findQuizIdByToken($quizToken);
        public function setQuizTokenToSession($quizToken);
        public function getQuizStatusByToken($quizToken);
        public function setQuizStatusToActive($quizId);
        public function getQuestionsNumber($quizId);
        public function update($quiz_id);
        public function getQuizzes();
        public function getQuestions($quizToken); //Retorna um array com os objetos questions
        public function getQuizRanking();
    }