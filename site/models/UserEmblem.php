<?php
    class UserAvatar {
        private $user_emblem_id;
        private $user_id;
        private $emblem_id;
        public function getUserEmblemId($user_emblem_id) {
            return $this->$user_emblem_id;
        }
        public function setUserEmblemId($user_emblem_id) { 
            $this->user_emblem_id = $user_emblem_id;
        }
        public function getUserId($user_id) {
            return $this->$user_id;
        }
        public function setUserId($user_id) { 
            $this->user_id = $user_id;
        }
        public function getEmblemId($emblem_id) {
            return $this->$emblem_id;
        }
        public function setEmblemId($emblem_id) { 
            $this->emblem_id = $emblem_id;
        }
    }