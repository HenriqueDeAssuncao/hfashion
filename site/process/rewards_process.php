<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/UserAvatar.php";
require_once __DIR__ . "/../dao/UserAvatarDAO.php";
require_once __DIR__ . "/../models/Message.php";

if (!empty($_POST)) {
    $Message = new Message($CURRENT_URL);

    $userId = $_POST["user-id"];
    $avatarId = $_POST["avatar-id"];

    if ($userId && $avatarId) {

        if ($userId && $avatarId) {
            if ($_SESSION["rewards"]["auth"] = "true") {
                $UserAvatarDao = new UserAvatarDAO($conn, $CURRENT_URL);
                $UserAvatarDao->registerAvatar($userId, $avatarId);
                $_SESSION["rewards"]["auth"] = "false";
            } else {
                $Message->setMessage("Você não tem permissão para acessar esta página.", "error", "back");
            }
        }
    } else {
        $Message->setMessage("Escolha uma recompensa!", "error", "back");
    }

} else {
    $Message->setMessage("Escolha uma recompensa!", "error", "back");
}