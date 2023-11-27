<?php
require_once "templates/header.php";
require_once "data/articles.php";
require_once "dao/QuizDAO.php";
require_once "dao/UserAnswerQuestionDAO.php";

$userData = $userDao->verifyToken(true);

if (isset($_GET['id'])) {

   $articleId = $_GET['id'];
   $currentArticle;

   foreach ($articles as $article) {
      if ($article['id'] == $articleId) {
         $currentArticle = $article;
      }
   } 

   if (!empty($currentArticle)) {

      $QuizDao = new QuizDAO($conn, $CURRENT_URL);
      $Quiz = $QuizDao->findQuizByArticleId($articleId);
      $userAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);


      if(!empty($Quiz)) {

         $quizId = $Quiz->getQuizId();
         $quizName = $Quiz->getQuizName();
         $userId = $userData->getId();

         if(!$userAnswerQuestionDao->isQuizAvailable($userId, $quizId)) {

            $class = "Fixed";
         } else {
            
            $class = "Hidden";
         }

      } else {
         $class = "Hidden";
      }
      
   } else {

      $message->setMessage("Artigo não disponível.", "error", "kick");

   }
}

?>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/article.css">

<div class="container-form <?= $class ?> Flex">

   <form action="<?= $CURRENT_URL ?>/process/available_quiz_process.php" method="post">
      <input type="hidden" name="userId" value="<?= $userId ?>">
      <input type="hidden" name="quizId" value="<?= $quizId ?>">
      <input type="hidden" name="quizName" value="<?= $quizName ?>">
      <input type="submit" value="Marcar como lido" class="Button btn-article">
   </form>

</div>

<div class="Container Flex">
   <div class="container-banner"
      style="background-image: url(<?= $CURRENT_URL ?>/img/artigos/<?= $currentArticle["folder"] ?>/<?= $currentArticle["banner"] ?>);">

      <div class="titulo Flex">
         <p class="titulo-artigo">
            <?= $currentArticle["title"] ?>
         </p>
      </div>

   </div>
</div>

<?php foreach ($currentArticle["content"] as $section): ?>
  
   <div class="container-pag">

      <?php if(!empty($section["img"])):?>
         <div class="img-pag Auto"
            style="background-image: url(<?= $CURRENT_URL ?>/img/artigos/<?=$currentArticle["folder"]?>/<?=$section["img"]?>);">
            
         </div>
      <?php endif;?>
      
      <div class="div-pag Flex">
         <p class="txt-pag">
            <?=$section["p"]?>
         </p>
      </div>

   </div>

   <hr>

<?php endforeach; ?>

<script src="<?= $CURRENT_URL ?>/script/article.js"></script>

<?php
require_once "templates/footer.php";
?>