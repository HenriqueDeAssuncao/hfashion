<?php
    if (empty($_GET["index"])) {
        $index = 0;
    } else {
        $indexStr = $_GET["index"];
        $index = intval($indexStr);
    }
    $stringOptions = $questions[$index]->getOptions();
    $options = explode(",", $stringOptions);

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

    <p><?=$questions[$index]->getQuestion()?></p>

    <div class="options">
        <?php foreach($options as $option):?>
            <button class="btn-options"><?=$option?></button>
        <?php endforeach;?>
    </div>
    
</div>