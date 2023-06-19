<?php
    class Quiz {
        private $message;
        private $quizId;
        private $userId;
        private $emblemId;
        private $firstAvatarId;
        private $secondAvatarId;
        private $quizToken; //Hash pra usar de url
        private $quizName;
        private $quizDescription;
        private $questionWeight;
        private $iconPath;
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
        public function getQuestionsByQuizId(); //Retorna um array com os objetos questions
        public function getQuizRanking();
    }