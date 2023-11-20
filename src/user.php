<?php
  require_once "templates/header.php";

  require_once "helpers/url.php";
  require_once "helpers/db.php";
  require_once "models/User.php";
  require_once "dao/UserDAO.php";

  //Emblemas
  require_once "dao/EmblemDAO.php";
  require_once "models/UserEmblem.php";
  require_once "dao/UserEmblemDAO.php";

  $userId = $_GET["userId"];

  $userData = $userDao->findById($userId);

  //Emblemas
  $EmblemDao = new EmblemDAO($conn, $CURRENT_URL);
  $UserEmblemDao = new UserEmblemDAO($conn, $CURRENT_URL);
  $userEmblems = $UserEmblemDao->findEmblems($userId, $EmblemDao);

?>

<link rel="stylesheet" type="text/css" href="css/user.css">

<div class = "user-popup Flex">
  <div class="container-user-popup Auto">
  
    <a href="<?=$CURRENT_URL?>/dashboard.php" class="btn-close-user-popup">
        <img src="<?=$CURRENT_URL?>/img/dashboard/back-icon.svg" alt="Ícone de voltar" class="back-icon">
    </a>
    <div class="user-content Flex">
        <div class="container-img-user">
            <div class="img-user profile-img" style="background-image: url('<?= $CURRENT_URL ?>/<?= $userData->getImage() ?>')" alt="Avatar do usuário"> </div>
        </div>
        <div class="user-info">
            <div class="info-text">
                <p class="p-nickname"><?= $userData->getNickname() ?></p>
                <p class="p-email"><?= $userData->getEmail() ?></p>
                <p class="p-bio"><?= $userData->getBio() ?></p>
            </div>
            <div class="info-emblems">
              <?php foreach ($userEmblems as $emblem): ?>
                  <img src="<?= $CURRENT_URL ?>/<?= $emblem["emblem_path"] ?>" alt="Emblema <?= $emblem["emblem_name"] ?>" class="emblems" title="<?=$emblem["emblem_name"]?>">
              <?php endforeach; ?>
            </div>
        </div>
    </div>
  
  </div>
</div>

<?php
  require_once "templates/footer.php";
?>