<?php
    require_once __DIR__ . "/../models/User.php";
    require_once __DIR__ . "/../models/Message.php";

    class UserDAO implements UserDAOinterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
    }