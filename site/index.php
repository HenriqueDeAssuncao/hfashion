<?php
require_once("templates/header.php");
?>
<!-- FOTO DE FUNDO -->
</div>
<div id="container-banner"
  style="background-image: url(<?= $CURRENT_URL ?>/img/index/banner.svg); width:100%; height:940px;">
  <div id="container-logo">
    <p id="txt_logo_high">CONHEÇA A MODA DE</p>
    <img src="img/index/logo_high.svg" id="img_logo_high">
    <div id="div-btn-roll">
      <a href="#container-aboutus" id="btn-roll"> CONHEÇA O HIFASHION </a>
    </div>
  </div>
</div>

<!-- SOBRE NOS -->
<div class="container">
  <div id="container-aboutus">
    <div id="info-aboutus">
      <div id="div-img-aboutus">
        <img src="img/index/logo_circle.svg" id="img_logo_aboutus">
      </div>
      <div id="div-text-aboutus">
        <p class="style-maintext" id="align-aboutus"> De onde surgiu o HiFashion?</p>
        <p class="style-regulartext">Learning with Duolingo is fun, and research shows that it works! With quick,
          bite-sized lessons,you’ll earn points and unlock new levels while gaining real-world communication skills.</p>
      </div>
    </div>
  </div>
  <hr class="hr">

  <!-- O QUE VOCE VAI APRENDER -->
  <div id="container-oqvcvera">
    <div id="info-oqvcvera">
      <div id="div-title">
        <p class="style-maintext">O que você vai aprender?</p>
      </div>

        <div id="div-topicos">

        <div class="div-coluna">

          <div class="cursos">
            <div class="icon-cursos">
              <img src="img/index/estetica.png" id="img-logo-cursos">
            </div>

            <div class="text-cursos">
              <p class="style-maintext" id="size-cursos-main"> História da moda</p>
              <p class="style-regulartext" id="size-cursos-regular">Our courses effectively and efficiently teach
                reading, listening, and speaking skills. Check out our</p>
            </div>
          </div>
          
          <div class="cursos">
            <div class="icon-cursos">
              <img src="img/index/estetica.png" id="img-logo-cursos">
            </div>

            <div class="text-cursos">
              <p class="style-maintext" id="size-cursos-main"> História da moda</p>
              <p class="style-regulartext" id="size-cursos-regular">Our courses effectively and efficiently teach
                reading, listening, and speaking skills. Check out our</p>
            </div>
          </div>

        </div>

        <div id="div-ilustracaosharpay" class=" Flex"></div>
        
      </div>
    </div>
  </div>
  <hr class="hr">
</div>
<?php
require_once("templates/footer.php");
?>
