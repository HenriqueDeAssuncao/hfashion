<?php
	require_once __DIR__ . ("/../helpers/url.php");
    require_once __DIR__ . ("/../helpers/db.php");
    require_once __DIR__ . ("/../dao/UserDAO.php");
    require_once __DIR__ . ("/../models/User.php");
	require_once __DIR__ . ("/../models/Message.php");
   
	
    $message = new Message($CURRENT_URL);
    $userDao = new UserDao($conn, $CURRENT_URL);
	$userData = $userDao->verifyToken(true);
	$User = new User();
 
	$type = $_POST["type"];
	if((!empty($type)) && $type == "update") {
		$bio = $_POST["bio"];
		$nickname = $_POST["nickname"];
	
		$userData->setBio($bio);
		if ($nickname !== "") {
			if ($userDao->findByNickname($nickname) == false) {
				$userData->setNickname($nickname);
			} else {
				$message->setMessage("O apelido já existe. Tente criar outro!", "error", "back");
			}
		}

		//UPLOAD DA IMAGEM

		if (isset($_POST["avatar-path"]) && !empty($_POST["avatar-path"])) {
			$avatar = $_POST["avatar-path"];
			$userData->setImage($avatar);
		}
			
		$userDao->update($userData);
	
	} elseif ($type == "changepassword") {
		$password = $_POST["password"];
		$confirmpassword = $_POST["confirmpassword"];
		if ($password == $confirmpassword) {
			$finalpassword = $User->generatePassword($password);
			$userData->setPassword($finalpassword);
			$userDao->changePassword($userData);
		} else {
			$message->setMessage("As senhas não são iguais!", "error", "back");
		}
	}
