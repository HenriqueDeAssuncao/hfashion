<?php
    class UserEmblem {
        private $userEmblemId;
        private $userId;
        private $emblemId;
        public function getUserEmblemId($userEmblemId) {
            return $this->$userEmblemId;
        }
        public function setUserEmblemId($userEmblemId) { 
            $this->userEmblemId = $userEmblemId;
        }
        public function getUserId($userId) {
            return $this->$userId;
        }
        public function setUserId($userId) { 
            $this->userId = $userId;
        }
        public function getEmblemId($emblemId) {
            return $this->$emblemId;
        }
        public function setEmblemId($emblemId) { 
            $this->emblemId = $emblemId;
        }
    }
    interface UserEmblemDAOInterface {
        public function isEmblemUnlocked($userId, $emblemId);
        public function registerEmblem($userId, $emblemId);
        public function findEmblems($userId, EmblemDAO $EmblemDao);
    }