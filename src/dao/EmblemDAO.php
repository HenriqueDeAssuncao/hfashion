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
        public function findEmblem($quizId) {
            $stmt = $this->conn->prepare("SELECT * FROM emblems WHERE quiz_id = :quiz_id");
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
            $emblem = $stmt->fetch(PDO::FETCH_ASSOC);
            return $emblem;
        }
        public function findUserEmblem($emblemId) {
            $stmt = $this->conn->prepare("SELECT * FROM emblems WHERE emblem_id = :emblem_id");
            $stmt->bindParam(":emblem_id", $emblemId);
            $stmt->execute();
            $emblem = $stmt->fetch(PDO::FETCH_ASSOC);
            return $emblem;
        }
        public function findQuizTokenByQuizId($quizId) {
            $stmt = $this->conn->prepare("SELECT quiz_token FROM quizzes WHERE quiz_id = :quiz_id");
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->execute();
            $quizToken = $stmt->fetch(PDO::FETCH_ASSOC);
            return $quizToken["quiz_token"];
        }
        public function findAllEmblemsPaths() {
            $stmt = $this->conn->prepare("SELECT * FROM emblems");
            $stmt->execute();
            $emblemsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $emblems = [];
            foreach ($emblemsArray as $item) {
                $Emblem = new Emblem;
                $quizId = $item["quiz_id"];
                $quizToken = $this->findQuizTokenByQuizId($quizId);
                $Emblem->setQuizToken($quizToken);
                $Emblem->setEmblemId($item["emblem_id"]);
                $Emblem->setQuizId($item["quiz_id"]);
                $Emblem->setEmblemName($item["emblem_name"]);
                $Emblem->setEmblemPath($item["emblem_path"]);
                $emblems[] = $Emblem;
            }
            return $emblems;
        }
    }

