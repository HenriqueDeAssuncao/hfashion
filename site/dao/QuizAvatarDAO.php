<?php
    class QuizAvatarDAO implements QuizAvatarDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function createQuizAvatar(QuizAvatar $quizAvatar) {
            $quizId = $quizAvatar->getQuizId();
            $avatarId = $quizAvatar->getAvatarId();

            $stmt = $this->conn->prepare("INSERT INTO quizzes_avatars (
                quiz_id, avatar_id
                ) VALUES (
                    :quiz_id, :avatar_id
                )");
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->bindParam(":avatar_id", $avatarId);

            $stmt->execute();
        }
    }