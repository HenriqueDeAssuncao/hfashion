<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");
    require_once("data/quizzes.php");

    //RESGATO O QUIZ CUJO ID CORRESPONDE AO ID PASSADO POR PARÂMETRO
    if (!empty($_GET)) {
        $quiz_id = $_GET["id"];
        foreach ($quizzes as $quiz) {
            if ($quiz['id'] == $quiz_id) {
                $current_quiz = $quiz;
            }
        }
    }
?>
dfgh
<div class="container">

    <h1><?=$current_quiz['title']?></h1>
    <form action="process/quiz_process.php" method="POST">
        <!-- COM ESSE FOREACH CONSIGO PERCORRER E EXIBIR TODAS AS QUESTÕES DO ARRAY $current_quiz RESGATADO ANTERIORMENTE -->
        <?php foreach($current_quiz['questions'] as $question):?>
            <div>
                <h2><?=$question['name']?></h2>
                <!-- COM ESSE FOREACH CONSIGO PERCORRER E EXIBIR TODAS AS OPÇÕES DE UMA QUESTÃO -->
                <?php foreach($question['options'] as $option):?>
                    <ul class="options">
                        <div class="option">
                            <input type="radio" name="option" value="<?=$option?>"/>
                            <span><?=$option?></span>
                        </div>
                    </ul>
                <?php endforeach;?>
            </div>
        <?php endforeach?>
        <input type="submit" class="btn-quiz Button"></input>
    </form>

</div>

<?php
    require_once("templates/footer.php");
?>
