<?php
    class Emblem {
        private $emblemId;
        private $quizId;
        private $quizToken;
        private $emblemName;
        private $emblemPath;
        public function getEmblemId() {
            return $this->emblemId;
        }
        public function setEmblemId($emblemId) {
            $this->emblemId = $emblemId;
        }
        public function getQuizId() {
            return $this->quizId;
        }
        public function setQuizId($quizId) {
            $this->quizId = $quizId;
        }
        public function getQuizToken() {
            return $this->quizToken;
        }
        public function setQuizToken($quizToken) {
            $this->quizToken = $quizToken;
        }
        public function getEmblemName() {
            return $this->emblemName;
        }
        public function setEmblemName($emblemName) {
            $this->emblemName = $emblemName;
        }
        public function getEmblemPath() {
            return $this->emblemPath;
        }
        public function setEmblemPath($emblemPath) {
            $this->emblemPath = $emblemPath;
        }
    }

    interface EmblemDAOInterface {
        public function createEmblem(Emblem $emblem);
    }

    