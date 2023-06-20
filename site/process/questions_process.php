<?php
    require_once __DIR__ . "/../helpers/url.php";
    require_once __DIR__ . "/../models/Message.php";

    require_once __DIR__ . "/../models/Quiz.php";
    require_once __DIR__ . "/../dao/QuizDAO.php";
    require_once __DIR__ . "/../models/Question.php";
    require_once __DIR__ . "/../dao/QuestionDAO.php";

    require_once __DIR__ . "/../helpers/verify_adm.php";
    require_once __DIR__ . "/../helpers/verify_quiz.php";

    if (!empty($_GET['questionsNumber'])) {
        $index = $_GET['questionsNumber'];
        
        $quizId = $quizDao->findQuizIdByToken($quizToken);

        $questionsArray = $_POST["questions"];
        $optionsArray = array_chunk(($_POST["options"]), 4);
        $answersArray = $_POST["answers"];

        $i = 0;
        foreach($questionsArray as $item) {
            $question = new Question($quizId);
            $questionDao = new QuestionDAO($conn, $CURRENT_URL);
    
            $question->setQuestion($questionsArray[$i]);
            $options = [];
            for ($c=0; $c <= 3 ; $c++) { 
                $option;
                $option = $optionsArray[$i][$c];
                $options[] = $option;
            }
            $question->setOptions($options);
            $question->setAnswer($answersArray[$i]);

            $questionDao->createQuestion($question);

            $i++;
        }

    } else {

    }