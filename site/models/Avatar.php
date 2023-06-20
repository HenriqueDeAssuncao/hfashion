<?php
    class Avatar {
        private $avatarId;
        private $quizId;
        private $avatarName;
        private $avatarPath;

        public function getAvatarId() {
            return $this->avatarId;
        }
        public function setAvatarId($avatarId) { 
            $this->avatarId = $avatarId;
        }
        public function getQuizId() {
            return $this->quizId;
        }
        public function setQuizId($quizId) { 
            $this->quizId = $quizId;
        }
        public function getAvatarName() {
            return $this->avatarName;
        }
        public function setAvatarName($avatarName) { 
            $this->avatarName = $avatarName;
        }
        public function getAvatarPath() {
            return $this->avatarPath;
        }
        public function setAvatarPath($avatarPath) { 
            $this->avatarPath = $avatarPath;
        }
    }
    interface AvatarDAOInterface {
        public function createAvatar(Avatar $avatar);
    }