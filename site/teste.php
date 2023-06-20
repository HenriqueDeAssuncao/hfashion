<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require_once "helpers/db.php";
        require_once "models/Quiz.php";
        require_once "models/Message.php";

       if (!empty($_POST)) {
        $quizId = $_POST['id'];

        $stmt = $conn->prepare("SELECT * FROM quizzes WHERE quiz_id = :quiz_id");
        $stmt->bindParam(":quiz_id", $quizId);
    
        $tudo = $stmt->fetch();

        print_r($tudo);
       }
    ?>
</head>
<body>
    <form action="" method="POST">
        <label for="id">id:</label>
        <input type="text" name="id">
        <input type="submit" value="enviar">
    </form>
</body>
</html>