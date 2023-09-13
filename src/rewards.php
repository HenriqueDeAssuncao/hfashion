<?php
    require_once "templates/header.php";
    if (!empty($userData)) {
        if (!empty($_SESSION["rewards"]) && $_SESSION["rewards"]["auth"] === "true") {
            $rewards = $_SESSION["rewards"];
            $userId = $userData->getId();
    
            if (!empty($_GET["correct"]) && !empty($_GET["questions"]) && !empty($_GET["score"])) {
                $score = $_GET["score"];
                $rightAnswers = $_GET["correct"];
                $questionsNumber = $_GET["questions"];
    
                $type = $rewards["type"];
                if ($type === "avatars") {
                    if (count($rewards["avatars"])) {
                        $avatars = $rewards["avatars"];
                    }
                }
                if (!empty($rewards["emblem"])) {
                    $emblem = $rewards["emblem"];
                }
            }
        } else {
            $message->setMessage("Recompensas não disponíveis", "error", "kick");
        }
    } else {
        $message->setMessage("Usuário não autenticado", "error", "back");
    }
?>

<?php
    require_once "templates/message.php";
?>

<div class="container-awards">
    <div class="container-avatars">
        <?php if($type === "avatars"):?>
            <?php if(!empty($avatars)):?>
                <p>Parabéns! Escolha um dos avatares como recompensa!</p>
                <form action="<?=$CURRENT_URL?>/process/rewards_process.php" method="POST">
                    <input type="hidden" value="<?=$type?>" name="type">
                    <input type="hidden" value="<?=$userId?>" name="user-id">
                    <?php foreach($avatars as $avatar): ?>
                        <label for="avatar-id"><img src="<?=$CURRENT_URL?>/<?=$avatar["avatar_path"]?>" alt="Imagem avatar"></label>
                        <input type="radio" name="avatar-id" value="<?=$avatar["avatar_id"]?>">
                    <?php endforeach;?>
                    <input type="submit" value="enviar">
                </form>
            <?php endif;?>
        <?php endif;?>
    </div>
    <div class="container-emblem">
        <?php if(!empty($emblem)):?>
            <p>Você desbloqueou o emblema <?=$emblem["emblem_name"]?></p>
            <img src="<?=$CURRENT_URL?>/<?=$emblem["emblem_path"]?>" alt="Imagem emblema">
        <?php endif;?>
    </div>
</div>

<p>Parabéns</p>
<p>Você acertou <?=$rightAnswers?> de <?=$questionsNumber?> questões</p>
<p>Você marcou <?=$score?> pontos!</p>

<?php
    require_once "templates/footer.php";
?>