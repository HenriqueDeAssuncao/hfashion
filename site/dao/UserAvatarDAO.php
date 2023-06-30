<?php
    require_once __DIR__ . "/../models/UserAvatar.php";
    require_once __DIR__ . "/../models/Message.php";

    class UserAvatarDAO implements UserAvatarDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
        public function isAvatarUnlocked($userId, $avatarId) {
            $stmt = $this->conn->prepare("SELECT * FROM users_avatars WHERE 
                    user_id = :user_id AND avatar_id = :avatar_id
            ");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":avatar_id", $avatarId);
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                return false;
            } else {
                return true;
            }
        }
        public function registerAvatar($userId, $avatarId) {
            $isAvatarUnlocked = $this->isAvatarUnlocked($userId, $avatarId);
            if ($isAvatarUnlocked === false) {
                $stmt = $this->conn->prepare("INSERT INTO users_avatars (
                    user_id, avatar_Id
                    ) VALUES (
                        :user_id, :avatar_id
                    )");
                $stmt->bindParam(":user_id", $userId);
                $stmt->bindParam(":avatar_id", $avatarId);
                $stmt->execute();
            } else {
                return false;
            }
        }
    }