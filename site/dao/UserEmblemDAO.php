<?php
    require_once __DIR__ . "/../models/UserEmblem.php";
    require_once __DIR__ . "/../models/Message.php";

    class UserEmblemDAO implements UserEmblemDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
        public function isEmblemUnlocked($userId, $emblemId) {
            $stmt = $this->conn->prepare("SELECT * FROM users_emblems WHERE 
                    user_id = :user_id AND emblem_id = :emblem_id
            ");
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":emblem_id", $emblemId);
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                return false;
            } else {
                return true;
            }
        }
        public function registerEmblem($userId, $emblemId) {
            $isEmblemUnlocked = $this->isEmblemUnlocked($userId, $emblemId);
            if ($isEmblemUnlocked === false) {
                $stmt = $this->conn->prepare("INSERT INTO users_emblems (
                    user_id, emblem_id
                    ) VALUES (
                        :user_id, :emblem_id
                    )");
                $stmt->bindParam(":user_id", $userId);
                $stmt->bindParam(":emblem_id", $emblemId);
                $stmt->execute();
            } else {
                return false;
            }
        }
    }