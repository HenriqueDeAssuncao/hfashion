<?php
    require_once __DIR__ . "/../helpers/db.php";
    require_once __DIR__ . "/../models/Emblem.php";
    require_once __DIR__ . "/../models/Message.php";

    class EmblemDAO implements EmblemDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
        public function createEmblem(Emblem $emblem) {
            $emblemName = $emblem->getEmblemName();
            $quizId = $emblem->getQuizId();
            $emblemPath = $emblem->getEmblemPath();            

            $stmt = $this->conn->prepare("INSERT INTO emblems (
                emblem_name, emblem_path, quiz_id
                ) VALUES (
                    :emblem_name, :emblem_path, :quiz_id
                )");
            $stmt->bindParam(":emblem_name", $emblemName);
            $stmt->bindParam(":emblem_path", $emblemPath);
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
        }
    }

