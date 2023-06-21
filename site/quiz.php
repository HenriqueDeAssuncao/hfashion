<?php
    require_once "dao/QuizDAO.php";
    require_once "helpers/db.php";
    require_once "helpers/url.php";

    $quizDao = new QuizDAO($conn, $CURRENT_URL);

    if (!empty($_GET["token"])) {
        $quizToken = $_GET["token"];
        $quizId = $quizDao->findQuizIdByToken($quizToken);

        if ($quizId) {
            $questions = $quizDao->getQuestionsByQuizId($quizId);
        }

        foreach ($questions as $question) {
            echo $question->getQuestion();
            echo "<br>";
        }
    }


?>

