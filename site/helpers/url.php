<?php
<<<<<<< Updated upstream
        session_start();
        $CURRENT_URL = "http://" . $_SERVER['SERVER_NAME'] .":8080". dirname($_SERVER['REQUEST_URI']. '?');
=======
session_start();
$CURRENT_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']. '?');
>>>>>>> Stashed changes
