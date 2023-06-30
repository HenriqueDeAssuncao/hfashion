<?php
    class UserAvatar {
        private $user_avatar_id;
        private $user_id;
        private $avatar_id;
        public function getUserAvatarId($user_avatar_id) {
            return $this->$user_avatar_id;
        }
        public function setUserAvatarId($user_avatar_id) { 
            $this->user_avatar_id = $user_avatar_id;
        }
        public function getUserId($user_id) {
            return $this->$user_id;
        }
        public function setUserId($user_id) { 
            $this->user_id = $user_id;
        }
        public function getAvatarId($avatar_id) {
            return $this->$avatar_id;
        }
        public function setAvatarId($avatar_id) { 
            $this->avatar_id = $avatar_id;
        }
    }

    interface UserAvatarDAOInterface {
        public function isAvatarUnlocked($userId, $avatarId);
        public function registerAvatar($userId, $avatarId);
    }