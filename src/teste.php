<?php
require_once("templates/head.php");
?>

<form action="<?= $CURRENT_URL ?>/process/available_quiz_process.php?user=1&quizId=5" method="post">
    <input type="hidden" name="quiz-status" value="2">
    <input type="submit" value="Fazer Quiz">
</form>

<?php
require_once("templates/footer.php");
?>