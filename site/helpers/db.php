<?php
    $db_name = "hfashion";
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    
    $conn = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

    //HABILITAR ERROS PDO

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);