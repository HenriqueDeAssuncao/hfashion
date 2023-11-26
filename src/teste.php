<?php
require_once("templates/header.php");
?>

<div vw class="enabled">
  <div vw-access-button class="active"></div>
  <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
  </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
  new window.VLibras.Widget();
</script>

<form action="<?= $CURRENT_URL ?>/process/available_quiz_process.php?user=1&quizId=4" method="post">
    <input type="hidden" name="quiz-status" value="2">
    <input type="submit" value="Fazer Quiz">
</form>

<?php
require_once("templates/footer.php");
?>