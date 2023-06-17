<?php
    class Emblem {
        private $emblem_id;
        private $emblem_name;
        private $emblem_img;
        public function getEmblemId($emblem_id) {
            return $this->$emblem_id;
        }
        public function setEmblemId($emblem_id) {
            $this->emblem_id = $emblem_id;
        }
        public function getEmblemName($emblem_name) {
            return $this->$emblem_name;
        }
        public function setEmblemName($emblem_name) {
            $this->emblem_name = $emblem_name;
        }
        public function getEmblemImg($emblem_img) {
            return $this->$emblem_img;
        }
        public function setEmblemImg($emblem_img) {
            $this->emblem_img = $emblem_img;
        }
    }

    