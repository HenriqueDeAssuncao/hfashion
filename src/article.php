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

$class = "full";

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

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/article.css">

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

         <?php
            $class = "not-full";
         ?>
      <?php endif;?>
      
      <div class="div-pag <?=  $class ?> Flex" style="width: <?= $width ?>">
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