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
    <p class="p-question">
        <?= $questions[$index]->getQuestion() ?>
    </p>

    <div class="options">
        <?php for($i=0; $i<=count($options)-1; $i++):?>
            <div>
                <div class="container-option">
                    <label for="option" class="inputs-options"></label>
                    <input name="option" class="inputs-options" value="<?=$i?>" type="radio">
                </div>
                <p class="p-option"><?=$options[$i]?></p>
            </div>
        <?php endfor;?>
    </div>
</div>