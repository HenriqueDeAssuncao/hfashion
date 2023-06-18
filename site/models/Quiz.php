<?php
    class Quiz {
        private $message;
        private $quiz_id;
        private $quiz_token; //Hash pra usar de url
        private $quizName;
        private $quiz_description;
        private $question_weight;
        private $iconPath;
        public function __construct(Message $message) {
            $this->message = $message;
        }
        public function getQuizId() {
            return $this->quiz_id;
        }
        public function setQuizId($quiz_id) {
            $this->quiz_id = $quiz_id;
        }
        public function getQuizToken() {
            return $this->quiz_token;
        }
        public function setQuizToken($quiz_token) {
            $this->quiz_token = $quiz_token;
        }
        public function getQuizName() {
            return $this->quizName;
        }
        public function setQuizName($quizName) {
            $this->quizName = $quizName;
        }
        public function getQuizDescription() {
            return $this->quiz_description;
        }
        public function setQuizDescription($quiz_description) {
            $this->quiz_description = $quiz_description;
        }
        public function getQuestionWeight() {
            return $this->question_weight;
        }
        public function setQuestionWeight($question_weight) {
            $this->question_weight = $question_weight;
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
        public function getQuestionsByQuizId(); //Retorna um array com os objetos questions
        public function getQuizRanking();
    }