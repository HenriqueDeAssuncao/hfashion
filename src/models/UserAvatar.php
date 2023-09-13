<?php
    class UserAvatar {
        private $userAvatarId;
        private $userId;
        private $avatarIds;
        public function getUserAvatarId($userAvatarId) {
            return $this->$userAvatarId;
        }
        public function setUserAvatarId($userAvatarId) { 
            $this->userAvatarId = $userAvatarId;
        }
        public function getUserId($userId) {
            return $this->$userId;
        }
        public function setUserId($userId) { 
            $this->userId = $userId;
        }
        public function getAvatarId($avatarIds) {
            return $this->$avatarIds;
        }
        public function setAvatarId($avatarIds) { 
            $this->avatarIds = $avatarIds;
        }
    }

    interface UserAvatarDAOInterface {
        public function isAvatarUnlocked($userId, $avatarId);
        public function registerAvatar($userId, $avatarId);
        public function findAvatarsIds($userId);
        public function findAvatars($userId);
    }