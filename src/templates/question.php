<?php
require_once __DIR__ . "/../dao/QuizDAO.php";
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";

if (isset($_GET["index"])) {
    $index = $_GET["index"];
    $width = $_GET["width"];
} else {
    $index = 0;
    $width = "0%";
}



$questions = $_SESSION["questions"];
$options = $questions[$index]->getOptionsArray();
$questionsNumber = count($questions);

?>

<div class="main">

    <div class="Container">
        <div class="progress-bar" style="width: <?= $width ?>"></div>
    </div>

    <div class="mainimage">
        <img class="image" src="<?= $questions[$index]->getImage() ?>" alt="Imagem da pergunta">
    </div>

    <div class="text">
        <p class="level">Questão
            <?= $index + 1 ?> de
            <?= $questionsNumber ?>
        </p>
        <p class="title">
            <?= $questions[$index]->getQuestion() ?>
        </p>
    </div>

    <div class="button">
        <?php for ($i = 0; $i <= count($options) - 1; $i++): ?>
            <label class="neutrobutton" for="input<?= $i ?>" class="inputs-options">
                <p>
                    <?= $options[$i] ?>
                </p>
            </label>
            <input id="input<?= $i ?>" name="option" class="inputs-options" value="<?= $i ?>" type="radio">
        <?php endfor; ?>
    </div>

</div>