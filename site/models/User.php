<?php
    Class User {
        private $id;
        private $nickname;
        private $email;
        private $password;
        private $image;
        private $bio;
        private $token;

        public function generateToken() {
            return bin2hex(random_bytes(50)); //Aqui estou criando a hash
        }
        public function generatePassword($password)  {
            return password_hash($password, PASSWORD_DEFAULT);
        }

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
        public function setNickname($nickname) {
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
        public function buildUser($data);
        public function create(User $user, $auth = false);
        public function update(User $user, $redirect = true);
        public function verifyToken($protected = false);
        public function setTokenToSession($token, $redirect = true);
        public function authenticateUser($nickname_email, $password);
        public function findByNickname($nickname);
        public function findByEmail($email);
        public function findById($id);
        public function findByToken($token);
        public function destroyToken();
        public function changePassword(User $user);
    }