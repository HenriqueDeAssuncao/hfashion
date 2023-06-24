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

?>

<div class="question-header">
    <div class="quiz-progress-container">
        <div class="countdown"></div>
        <div class="quiz-progress"></div>
    </div>

    <div class="container-question">

    </div>
</div>

<div class="question">
    <p>
        <?= $questions[$index]->getQuestion() ?>
    </p>

    <div class="options">
        <?php foreach ($options as $option): ?>
            <button class="btn-options">
                <?= $option ?>
            </button>
        <?php endforeach; ?>
    </div>
</div>
