<?php
    require_once("templates/header.php");
    require_once("models/Emblem.php");
    require_once("dao/EmblemDAO.php");
    require_once("models/UserEmblem.php");
    require_once("dao/UserEmblemDAO.php");
    $userId = $userData->getId();
    $Emblem = new Emblem;
    $EmblemDao = new EmblemDAO($conn, $CURRENT_URL);
    $UserEmblemDao = new UserEmblemDAO($conn, $CURRENT_URL);
    $userEmblems = $UserEmblemDao->findEmblems($userId, $EmblemDao);
    $emblems = $EmblemDao->findAllEmblemsPaths();
?>

<style>
    img {
        width: 100px;
    }
</style>

<div class="container-user">
    <img src="<?=$CURRENT_URL?>/img/avatars/user.svg" alt="">
    <p><?=$userData->getNickname()?></p>
    <p><?=$userData->getBio()?></p>
    <div class="emblems">
        <?php if(count($userEmblems)):?>
            <?php foreach($userEmblems as $emblem):?>
                <img src="<?=$CURRENT_URL?>/<?=$emblem["emblem_path"]?>" alt="Emblema <?=$emblem["emblem_name"]?>">
            <?php endforeach;?>
        <?php endif;?>
    </div>
</div>

<div class="container-rankings">
    <div class="buttons-emblems">
        <?php foreach($emblems as $emblem):?>
            <button class="btn-emblems" value="<?=$emblem->getQuizId()?>">
                <img src="<?=$CURRENT_URL?>/<?=$emblem->getEmblemPath()?>" alt="<?=$emblem->getEmblemName()?>">
            </button>
        <?php endforeach;?>
        <div class="container-ranking">

        </div>
    </div>             
</div>

<script src="<?=$CURRENT_URL?>/script/show_ranking.js"></script>
<?php
    require_once("templates/footer.php");
?>