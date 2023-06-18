<?php
    require_once __DIR__ . "/../helpers/db.php";
    require_once __DIR__ . "/../models/Avatar.php";
    require_once __DIR__ . "/../models/Message.php";

    class AvatarDAO implements AvatarDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
        public function createAvatar(Avatar $avatar) {
            $avatarName = $avatar->getAvatarName();
            $quizId = $avatar->getQuizId();
            $avatarPath = $avatar->getAvatarPath();
            $stmt = $this->conn->prepare("INSERT INTO avatars (
                avatar_name, avatar_path, quiz_id
                ) VALUES (
                    :avatar_name, :avatar_path, :quiz_id
                )");
            $stmt->bindParam(":avatar_name", $avatarName);
            $stmt->bindParam(":avatar_path", $avatarPath);
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
        }
    }

