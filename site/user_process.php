<?php
    require_once("helpers/url.php");
    require_once("helpers/db.php");
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($CURRENT_URL);
    $userDao = new UserDao($conn, $CURRENT_URL);
	$userData = $userDao->verifyToken(true);
	$user = new User();
 
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

		if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
			$image = $_FILES["image"];
			$imageTypes = ["image/jpeg", "image/jpg", "image/png"];
            $jpgArray = ["image/jpeg", "image/jpg"];

			//CHECANDO O TIPO DA IMAGEM
			if (in_array($image["type"], $imageTypes)) {
				if (in_array($image["type"], $jpgArray)) {
					$imageFile = imagecreatefromjpeg($image["tmp_name"]);
				} else {
					$imageFile = imagecreatefrompng($image["tmp_name"]);
				}
				$imageName = $user->imageGenerateName();
				imagejpeg($imageFile, "./img/users/" . $imageName, 100);
				$userData->setImage($imageName);
			} else {
				$message->setMessage("Tipo inválido de imagem, insira png ou jpg!", "error", "back");
			}
		}
			
		$userDao->update($userData);
	
	} elseif ($type == "changepassword") {
		$password = $_POST["password"];
		$confirmpassword = $_POST["confirmpassword"];
		if ($password == $confirmpassword) {
			$finalpassword = $user->generatePassword($password);
			$userData->setPassword($finalpassword);
			$userDao->changePassword($userData);
		} else {
			$message->setMessage("As senhas não são iguais!", "error", "back");
		}
	}
