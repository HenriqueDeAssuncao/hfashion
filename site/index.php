<?php
    include_once("templates/header.php");
?>

<main>
    <!-- Na top-main eu coloco aquela imagem de fundo -->
    <div class="top-main">
    
    </div>

    <!-- Abaixo eu coloco a linha do tempo -->
        
    <!-- Abaixo eu insiro os cards de forma dinâmica -->
    <div class="Container">
        <?php foreach($cards as $card):?>
            <div class="card-Container">
                <h2><?=$card['title'];?></h2>

                <?php for ($i=0; $i < count($card['text']); $i++):?>
                    <p><?=$card['text'][$i];?></p>
                <?php endfor;?>
            </div>
        <?php endforeach;?>
    </div>
</main>

<?php
    include_once("templates/footer.php");
?>