<?php
    require_once __DIR__ . ("/../helpers/url.php");
    require_once __DIR__ . ("/../helpers/db.php");
    require_once __DIR__ . ("/../dao/UserDAO.php");
    require_once __DIR__ . ("/../models/User.php");
    require_once __DIR__ . ("/../models/Message.php");

    if ($_GET['questionsNumber']) {
        $num_questions = $_GET['questionsNumber'];
        
    }