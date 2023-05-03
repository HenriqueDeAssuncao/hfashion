<?php
    require_once("templates/header.php");
?>
  
<?php foreach($cards as $card):?>
    <div class="card-Container">
        <h2><?=$card['title'];?></h2>

        <?php for ($i=0; $i < count($card['text']); $i++):?>
            <p><?=$card['text'][$i];?></p>
        <?php endfor;?>
    </div>
<?php endforeach;?>

<?php
    require_once("templates/footer.php");
?>