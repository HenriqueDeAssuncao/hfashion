<?php
    require_once "helpers/url.php";
    require_once "helpers/db.php";
    require_once "dao/UserDAO.php";
    $userDao = new UserDAO($conn, $CURRENT_URL);
    $userData = $userDao->verifyToken(true);

    if (!empty($userData)) {
        if (isset($_SESSION["rewards"]) && $_SESSION["rewards"]["auth"] === "true") {
            $rewards = $_SESSION["rewards"];
            $userId = $userData->getId();
    
            if (isset($_GET["correct"]) && isset($_GET["questions"]) && isset($_GET["score"])) {
                $score = $_GET["score"];
                if (!$score) {
                    $score = 0;
                }
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

<div vw class="enabled">
  <div vw-access-button class="active"></div>
  <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
  </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
  new window.VLibras.Widget();
</script>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiFashion</title>
    <link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/global.css">
    <link rel="stylesheet" href="<?=$CURRENT_URL?>/css/rewards.css">
</head>

<body>

    <div class="rewards Flex">

        <div class="container-rewards Hidden">

            <div class="container-emblem">
                <?php if(!empty($emblem)):?>
                    <p>Você desbloqueou o emblema <?=$emblem["emblem_name"]?></p>
                    <div class="Flex">
                        <img src="<?=$CURRENT_URL?>/<?=$emblem["emblem_path"]?>" alt="Imagem emblema" class="emblem">
                    </div>
                    <div class="container-btn">
                        <?php if($type !== "avatars"):?>
                            <button class="btn-continuar btn-resgatar">Resgatar</button>
                        <?php endif;?>
                    </div>
                <?php endif;?>
            </div>

            <div class="container-avatars">

                <?php if($type === "avatars"):?>

                    <?php if(!empty($avatars)):?>

                        <p>Parabéns! Escolha um dos avatares como recompensa!</p>
                        <form action="<?=$CURRENT_URL?>/process/rewards_process.php" method="POST">
                            <input type="hidden" value="<?=$type?>" name="type">
                            <input type="hidden" value="<?=$userId?>" name="user-id">
                            <div class="avatars Flex">
                                <?php foreach($avatars as $avatar): ?>
                                    <label for="avatar<?=$avatar["avatar_id"]?>">
                                        <img src="<?=$CURRENT_URL?>/<?=$avatar["avatar_path"]?>" alt="Imagem avatar" class="avatar">
                                    </label>
                                    <input id="avatar<?=$avatar["avatar_id"]?>" class="Hidden" type="radio" name="avatar-id" value="<?=$avatar["avatar_id"]?>">
                                <?php endforeach;?>
                            </div>
                            <input class="btn-continuar" type="submit" value="Resgatar">
                        </form>

                    <?php endif;?>

                <?php endif;?>

            </div>

        </div>

    </div>

    <div class="Container Flex">

        <div class="container-feedback">  

            <?php
                require_once "templates/message.php";
            ?>

            <div class="feedback">
                <p class="p-title">Resultados</p>
                <div class="feedback-content Flex">
                    <p class="p-feedback">Você acertou <?=$rightAnswers?> perguntas de <?=$questionsNumber?>.</p>
                    <p class="p-feedback">Você marcou <?=$score?> pontos!</p>
                </div>
            </div>

            <div>
                <button class="btn-show-rewards">Continuar</button>
            </div>
                
        </div>

    </div>

</body>

<script src="<?= $CURRENT_URL ?>/script/rewards.js"></script>

</html>