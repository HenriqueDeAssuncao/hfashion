<?php
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../models/Message.php";

$message = new Message($CURRENT_URL);

if ((!empty($_POST)) && (!empty($_FILES))) {

    //Criar quiz

    $quiz_name = ucwords(trim($_POST['quiz-name']));
    $question_weight = $_POST['question-weight'];

    //Upload das imagens:
    //Emblema:
    if (isset($_FILES["emblem"]) && !empty($_FILES["emblem"]["tmp_name"])) {
        $emblem = $_FILES["emblem"];
    }
    //ícone
    if (isset($_FILES["quiz-icon"]) && !empty($_FILES["quiz-icon"]["tmp_name"])) {
        $quiz_icon = $_FILES["quiz-icon"];
    }
    //Avatares
    if (isset($_FILES["avatars"]) && !empty($_FILES["avatars"]["tmp_name"])) {
        $avatarsArray = $_FILES["avatars"]; //Essa variável é só pra eu contar os índices. Não é a que vou usar
        if ($avatarsArray["name"][0] && $avatarsArray["name"][1]) {
            $avatars = $avatarsArray;
        }
    }

    if ($quiz_name && $question_weight && $emblem && $quiz_icon && $avatars) {
        //Faço o cadastro
        $message->setMessage("Quiz criado!", "success", "manage_questions.php");
    } else {
        $message->setMessage("Todos os campos são obrigatórios!", "error", "back");
    }

    //Criar Perguntas

} else {
    $message->setMessage("Todos os campos são obrigatórios!", "error", "back");
}