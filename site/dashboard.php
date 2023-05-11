<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");
	//Restringindo a página:
	$userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);
?>

<h1>Teste Dashboard</h1>
<h2>Olá, <?=$userData->getNickname()?>!</h2>
<div class="profile-img" style="width: 200px; height: 200px; background-image: url(<?=$CURRENT_URL?>/img/users/<?=$image?>)">
</div>
<div>
	<p><?=$userData->getBio()?></p>
</div>
<?php
    require_once("templates/footer.php");
?>
