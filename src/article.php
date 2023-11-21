<?php
require_once "templates/header.php";
require_once "data/articles.php";

if (isset($_GET['id'])) {

   $articleId = $_GET['id'];
   $currentArticle;

   foreach ($articles as $article) {
      if ($article['id'] == $articleId) {
         $currentArticle = $article;
      }
   }

}

?>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/y2k.css">


<div class="Container Flex">
   <div class="container-banner"
      style="background-image: url(<?= $CURRENT_URL ?>/img/<?= $currentArticle["folder"] ?>/<?= $currentArticle["banner"] ?>);">

      <div class="titulo Flex">
         <p class="titulo-artigo">
            <?= $currentArticle["title"] ?>
         </p>
      </div>

   </div>
</div>

<?php foreach ($currentArticle["content"] as $section): ?>
   <div class="container-pag">
      <div class="img-pag">
         <img src="img/<?=$currentArticle["folder"]?>/<?=$section["img"]?>" class="img-mto-legal">
      </div>

      <div class="div-pag">
         <div class="Flex">
            <p class="txt-pag">
               <?=$section["p"]?>
               <br>
            </p>
         </div>
      </div>
   </div>
<?php endforeach; ?>

<?php
require_once "templates/footer.php";
?>