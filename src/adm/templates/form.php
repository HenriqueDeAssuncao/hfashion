<?php

require_once __DIR__ . "/../../helpers/url.php";
require_once __DIR__ . "/../../helpers/db.php";
require_once __DIR__ . "/../../dao/AdmDAO.php";
require_once __DIR__ . "/../../data/articles.php";

$AdmDao = new AdmDAO($conn, $CURRENT_URL);

$allArticlesIds = [];

foreach ($articles as $article) {
  $articleId = $article["id"];
  $allArticlesIds[] = $articleId;
}

$availableIds = $AdmDao->getAvailableIds($allArticlesIds);

$availableArticles = [];
$availableArticle = ["id" => "", "title" => ""];


foreach ($availableIds as $availableId) {

  for ($i=0; $i < count($articles) ; $i++) { 

    if ($articles[$i]["id"] === $availableId) {

      $availableArticle["id"] = $availableId;
      $availableArticle["title"] = $articles[$i]["title"];
      $availableArticles[] = $availableArticle;
      
    }

  }

}

$quizId = $_GET["quizId"];

?>

<form action="process/adm_manage_quizzes.php" method="post">

  <input type="hidden" name="type" value="article">
  <input type="hidden" name="quizId" value="<?= $quizId ?>">

  <div class="form-group">

    <label for="articleId[]">Selecione o artigo:</label>

    <select name="articleId[]"  style="margin-top: 25px;">
      <?php for($i = 0; $i < count($availableArticles); $i++):?>
        <option value="<?= $availableArticles[$i]["id"] ?>"><?= $availableArticles[$i]["title"] ?></option>
      <?php endfor;?>
    </select>

  </div>

  <div class="form-group Flex">
    <input type="submit" value="Relacionar" class="btn">
  </div>

</form>