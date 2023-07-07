<?php
    require_once __DIR__ . "/../models/UserAvatar.php";
    require_once __DIR__ . "/../models/Message.php";
    require_once __DIR__ . "/../models/Avatar.php";

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
        public function findAvatarsIds($userId) {
            $stmt = $this->conn->prepare("SELECT avatar_id FROM users_avatars WHERE 
                    user_id = :user_id
            ");
            $stmt->bindParam(":user_id", $userId);
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                return false;
            } else {
                $avatarsIdsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $avatarsIds = [];
                foreach ($avatarsIdsArray as $avatarId) {
                    $avatarsIds[] = $avatarId["avatar_id"];
                }
                return $avatarsIds;
            }
        }
        public function findAvatars($userId) {
            $avatarsIds = $this->findAvatarsIds($userId);
            $avatars = [];
            foreach ($avatarsIds as $avatarId) {
                $stmt = $this->conn->prepare("SELECT * FROM avatars WHERE 
                    avatar_id = :avatar_id
                ");
                $stmt->bindParam(":avatar_id", $avatarId);
                $stmt->execute();
                $avatar = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $Avatar = new Avatar;
                $Avatar->setAvatarId($avatar["avatar_id"]);
                $Avatar->setAvatarName($avatar["avatar_name"]);
                $Avatar->setAvatarPath($avatar["avatar_path"]);
                $Avatar->setQuizId($avatar["quiz_id"]);
                $avatars[] = $Avatar;
            }
            return $avatars;
        }
    }