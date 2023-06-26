<?php
    require_once "templates/header.php";
    if (!empty($_SESSION["rewards"])) {
        $rewards = $_SESSION["rewards"];
        if (!empty($_GET["r"]) && !empty($_GET["n"]) && !empty($_GET["s"])) {
            $score = $_GET["s"];
            $scorePortion = $_GET["sp"];
            echo $score . "<br>";
            echo $scorePortion;
        }
    } else {
        $message->setMessage("Recompensas não disponíveis", "error", "kick");
    }
?>



<?php
require_once "templates/footer.php";
?>