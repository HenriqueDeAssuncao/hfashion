<?php
require_once __DIR__ . "/../../helpers/url.php";
require_once __DIR__ . "/../../models/Message.php";
require_once __DIR__ . "/../../models/Quiz.php";
require_once __DIR__ . "/../../dao/QuizDAO.php";
require_once __DIR__ . "/../../models/Question.php";
require_once __DIR__ . "/../../dao/QuestionDAO.php";

require_once __DIR__ . "/../../helpers/verify_adm.php";
require_once __DIR__ . "/../../helpers/verify_quiz.php";

if (!empty($_GET['questionsNumber'])) {
    $index = $_GET['questionsNumber'];

    $quizId = $quizDao->findQuizIdByToken($quizToken);

    $questionsArray = $_POST["questions"];
    $optionsArray = array_chunk(($_POST["options"]), 4);
    $answersArray = $_POST["answers"];
    $imagesArray = $_FILES["images"];

    $imgNum = count($imagesArray["name"]);

    for ($i=0; $i < $imgNum ; $i++) { 
        $image = [];
        $image["name"] = $imagesArray["name"][$i];
        $image["type"] = $imagesArray["type"][$i];
        $image["tmp_name"] = $imagesArray["tmp_name"][$i];
        $image["error"] = $imagesArray["error"][$i];
        $image["size"] = $imagesArray["size"][$i];
        //print_r($image);
        //echo "<br>";

        //Cadastro a imagem
        $path = $Quiz->verifyImg($image, "questions");
        $Quiz->uploadImg($image, $path);

        $images[] = $path;
    }

    $i = 0;
    foreach ($questionsArray as $item) {
        $question = new Question($quizId);
        $questionDao = new QuestionDAO($conn, $CURRENT_URL);

        $question->setQuestion($questionsArray[$i]);
        $question->setImage($images[$i]);
        $options = [];
        for ($c = 0; $c <= 3; $c++) {
            $option;
            $option = $optionsArray[$i][$c];
            $options[] = $option;
        }
        $question->setOptions($options);
        $question->setAnswer($answersArray[$i]);

        $questionDao->createQuestion($question);

        $i++;
    }

    $quizDao->setQuizStatusToActive($quizId);

    $message->setMessage("O quiz está disponível aos usuários!", "success", "../index.php");

} else {

}