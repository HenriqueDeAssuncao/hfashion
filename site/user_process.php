<?php
    require_once("helpers/url.php");
    require_once("helpers/db.php");
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($CURRENT_URL);
    $userDao = new UserDao($conn, $CURRENT_URL);
	$userData = $userDao->verifyToken(true);
 
	if(!empty($_POST["type"])) {
		$type = $_POST["type"];
		
		$image = $_FILES["image"];
		$bio = $_POST["bio"];
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];
		$confirmpassword = $_POST["confirmpassword"];
		if($password === $confirmpassword) {
			$finalpassword = $password;
			$user = new User;
			$user->setImage($image);
			$user->setBio($bio);
			$user->setNickname($nickname);
			$user->setToken($userData->getToken());
			$user->setId($userData->getId());
			
			//ANTES EU PRECISO VER SE O NICKNAME É ÚNICO 
			$userDao->update($user);
		}
		
	}
