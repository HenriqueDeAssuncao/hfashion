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
            $UserAvatarDao = new UserAvatarDAO($conn, $CURRENT_URL);
            $UserAvatarDao->registerAvatar($userId, $avatarId);
        }

    }