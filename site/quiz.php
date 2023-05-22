<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");
    require_once("data/quizzes.php");

    if (!empty($_GET)) {
        $quiz_id = $_GET["id"];
        foreach ($quizzes as $quiz) {
            if ($quiz['id'] == $quiz_id) {
                $current_quiz = $quiz;
            }
        }
    }
?>

<div class="container">
    <h1><?=$current_quiz['title']?></h1>
    <?php foreach($current_quiz['questions'] as $question):?>
        <div>
            <h2><?=$question['name']?></h2>
            <?php foreach($question['options'] as $option):?>
                <ul>
                    <li><?=$option?></li>
                </ul>
            <?php endforeach;?>
        </div>
    <?php endforeach?>
</div>

<?php
    require_once("templates/footer.php");
?>
