<?php
require_once __DIR__ . "/../dao/QuizDAO.php";
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";

if (isset($_GET["index"])) {
    $index = $_GET["index"];
} else {
    $index = 0;
}

$questions = $_SESSION["questions"];
$options = $questions[$index]->getOptionsArray();
$questionsNumber = count($questions);

?>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/quiz.css">

<div class="container-question-header">
    <div class="question-image">
        <img class="image" src="<?= $questions[$index]->getImage() ?>" alt="Imagem da pergunta">
    </div>

    <div class="question-header">
        <p class="p-header">Questão
            <?= $index + 1 ?> de
            <?= $questionsNumber ?>
        </p>
        <p class="question">
            <?= $questions[$index]->getQuestion() ?>
        </p>
    </div>
</div>

<div class="options-container">
    <?php for ($i = 0; $i <= count($options) - 1; $i++): ?>
        <div class="option-container">
            <label class="option" for="input<?= $i ?>" class="inputs-options">
                <p>
                    <?= $options[$i] ?>
                </p>
            </label>
            <input id="input<?= $i ?>" name="option" class="inputs-options" value="<?= $i ?>" type="radio">
        </div>
    <?php endfor; ?>
</div>