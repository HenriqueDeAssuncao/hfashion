<?php
    class Avatar {
        private $avatar_id;
        private $avatar_name;
        private $avatar_img;

        public function getAvatarId($avatar_id) {
            return $this->$avatar_id;
        }
        public function setAvatarId($avatar_id) { 
            $this->avatar_id = $avatar_id;
        }
        public function getAvatarName($avatar_name) {
            return $this->$avatar_name;
        }
        public function setAvatarName($avatar_name) { 
            $this->avatar_name = $avatar_name;
        }
        public function getAvatarImg($avatar_img) {
            return $this->$avatar_img;
        }
        public function setAvatarImg($avatar_img) { 
            $this->avatar_img = $avatar_img;
        }
    }