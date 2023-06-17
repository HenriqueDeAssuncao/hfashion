<?php
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/Message.php";
require_once __DIR__ . "/../models/Quiz.php";
require_once __DIR__ . "/../dao/QuizDAO.php";

$message = new Message($CURRENT_URL);
$quiz = new Quiz;
$quizDao = new QuizDAO;

if ((!empty($_POST)) && (!empty($_FILES))) {

    $quiz_name = ucwords(trim($_POST['quiz-name']));
    $quiz_description = $_POST['quiz-description'];
    $question_weight = $_POST['question-weight'];
    $avatarsNamesArray = $_POST['avatars-names'];
    if ($avatarsNamesArray[0] && $avatarsNamesArray[1]) {
        $avatarsNames = $avatarsNamesArray;
    }

    //Upload das imagens:
    $emblem = $_FILES["emblem"];
    $quiz_icon = $_FILES["quiz-icon"];
    $avatarsArray = $_FILES["avatars"]; //Essa variável é só pra eu contar os índices. Não é a que vou usar

    if ($avatarsArray["name"][0] && $avatarsArray["name"][1]) {
        $avatars = $avatarsArray;
    } else {
        $message->setMessage("Todos os campos são obrigatórios!", "error", "back");
    }
}