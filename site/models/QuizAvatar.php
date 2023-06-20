<?php   
    class QuizAvatar {
        private $quizAvatarId;
        private $quizId;
        private $avatarId;

        public function getQuizAvatarId() {
            return $this->quizAvatarId;
        }
        public function setQuizAvatarId($quizAvatarId) {
            $this->quizAvatarId = $quizAvatarId;
        }
        public function getQuizId() {
            return $this->quizId;
        }
        public function setQuizId($quizId) {
            $this->quizId = $quizId;
        }
        public function getAvatarId() {
            return $this->quizAvatarId;
        }
        public function setAvatarId($avatarId) {
            $this->avatarId = $avatarId;
        }
    }

    interface QuizAvatarDAOInterface {
        public function createQuizAvatar(QuizAvatar $quizAvatar);
    }