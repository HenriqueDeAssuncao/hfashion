<?php
    class QuestionDAO implements QuestionDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }
        public function createQuestion(Question $question) {
            $quizId = $question->getQuizId();
            $questionContent = $question->getQuestion();
            $options = $question->getOptions();
            $optionsString = (implode(",", $options));
            $answer = $question->getAnswer();

            $stmt = $this->conn->prepare("INSERT INTO questions (
                quiz_id, question, options, answer
                ) VALUES (
                    :quiz_id, :question, :options, :answer
                )");
            $stmt->bindParam(":quiz_id", $quizId);
            $stmt->bindParam(":question", $questionContent);
            $stmt->bindParam(":options", $optionsString);
            $stmt->bindParam(":answer", $answer);

            $stmt->execute();

        }
    }