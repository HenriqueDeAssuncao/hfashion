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
            $quizId = $avatar->getQuizId();
            $avatarName = $avatar->getAvatarName();
            $avatarPath = $avatar->getAvatarPath();
            $stmt = $this->conn->prepare("INSERT INTO avatars (
                quiz_id, avatar_name, avatar_path
                ) VALUES (
                    :quiz_id, :avatar_name, :avatar_path
                )");
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->bindParam(":avatar_name", $avatarName);
            $stmt->bindParam(":avatar_path", $avatarPath);
            $stmt->execute();
        }
        public function findAvatars($quizId) {
            $stmt = $this->conn->prepare("SELECT * FROM avatars WHERE quiz_id = :quiz_id");
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
            $avatars = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $avatars;
        }
    }