<?php
require_once("templates/header.php");
?>

<form action="<?= $CURRENT_URL ?>/process/available_quiz_process.php?user=2&quizId=1" method="post">
    <input type="hidden" name="quiz-status" value="2">
    <input type="submit" value="Fazer Quiz">
</form>

<?php
require_once("templates/footer.php");
?>