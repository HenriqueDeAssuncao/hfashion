

<div class="container-img-user">
    <div class="img-user profile-img" style="background-image: url('<?= $CURRENT_URL ?>/<?= $image ?>')" alt="Avatar do usuário"> </div>
</div>
<div class="user-info">
    <div class="info-text">
        <p class="p-nickname"><?= $userData->getNickname() ?></p>
        <p class="p-email"><?= $userData->getEmail() ?></p>
        <a href="<?= $CURRENT_URL ?>/edit_profile.php" class="a-dashboard">editar perfil</a>
        <p class="p-bio"><?= $userData->getBio() ?></p>
    </div>
    <div class="info-emblems">
        <?php foreach ($userEmblems as $emblem): ?>
            <img src="<?= $CURRENT_URL ?>/<?= $emblem["emblem_path"] ?>" alt="Emblema <?= $emblem["emblem_name"] ?>" class="emblems">
        <?php endforeach; ?>
    </div>
</div>