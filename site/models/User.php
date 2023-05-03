<?php
    Class User {
        private $id;
        private $nickname;
        private $email;
        private $password;
        private $image;
        private $bio;
        private $token;

        //SETS E GETS
        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getNickname() {
            return $this->nickname;
        }
        public function setNickname($nickName) {
            $this->nickname = $nickname;
        }

        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }

        public function getPassword() {
            return $this->password;
        }
        public function setPassword($password) {
            $this->password = $password;
        }

        public function getImage() {
            return $this->image;
        }
        public function setImage($image) {
            $this->image = $image;
        }

        public function getBio() {
            return $this->bio;
        }
        public function setBio($bio) {
            $this->bio = $bio;
        }

        public function getToken() {
            return $this->token;
        }
        public function setToken($token) {
            $this->token = $token;
        }

        //FUNÇÕES QUE NÃO VÃO INTERAGIR COM O BANCO
    }

    interface UserDAOInterface {
        public function buildUser();
        public function create();
        public function update();
        public function verifyToken();
        public function setTokenToSession();
        public function authenticateUser();
        public function findBy();
        public function findById();
        public function findByToken();
        public function destroyToken();
        public function changePassword();
    }