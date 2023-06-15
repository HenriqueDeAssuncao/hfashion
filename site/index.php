<?php
require_once "templates/header.php";
?>
<!-- FOTO DE FUNDO -->
</div>
<div id="container-banner" style="background-image: url(<?= $CURRENT_URL ?>/img/index/banner.svg); width: 100%;; height:100%;">
  <div id="container-logo">
    <p id="txt_logo_high">CONHEÇA A MODA DE</p>
    <img src="img/index/logo_high.svg" id="img_logo_high">
    <div id="div-btn-roll">
      <a href="#container-aboutus" id="btn-roll"> CONHEÇA O HIFASHION </a>
    </div>
  </div>
</div>

<div class="Container Flex">
  <?php
  require_once("templates/message.php");
  ?>
</div>

<!-- SOBRE NOS -->
<div id="container-aboutus" class="js-scroll">
  <div id="info-aboutus">
    <div id="div-img-aboutus">
      <img src="img/index/logo_circle.svg" id="img_logo_aboutus">
    </div>
    <div id="div-text-aboutus">
      <p class="style-maintext" id="align-aboutus">
        De onde surgiu o HiFashion?
      </p>
      <p class="style-regulartext">
        Learning with Duolingo is fun, and research shows that it works! With quick,
        bite-sized lessons,you’ll earn points and unlock new levels while gaining real-world communication skills.
      </p>
    </div>
  </div>
</div>

<!-- SEPARAR A PÁGINA -->
<hr class="hidden">

<!-- O QUE VOCE VAI APRENDER -->

<!-- TÍTULO -->
<div id="container-oqvcvera">
  <div id="info-oqvcvera" class="js-scroll">

    <div id="div-title">
      <p class="style-titles">O que você vai aprender?</p>
    </div>


    <div id="div-topicos">

      <!-- COLUNA ESQUERDA -->
      <div class="div-coluna">

        <!-- PRIMEIRO CARD -->
        <div class="cursos">
          <div class="icon-cursos">
            <img src="img/index/estetica.png" id="img-logo-cursos">
            <p class="style-maintext"> História da moda</p>
          </div>
          <div class="text-cursos">
            <p class="style-regulartext">
              Our courses effectively and efficiently teach
              reading, listening, and speaking skills. Check out our
            </p>
          </div>
        </div>
        <!-- SEGUNDO CARD -->

        <div class="cursos">
          <div class="icon-cursos">
            <img src="img/index/estetica.png" id="img-logo-cursos">
            <p class="style-maintext"> História da moda</p>
          </div>
          <div class="text-cursos">
            <p class="style-regulartext">
              Our courses effectively and efficiently teach
              reading, listening, and speaking skills. Check out our
            </p>
          </div>
        </div>


      </div>


      <!-- FUTURA ILUSTRAÇÃO DA SHARPAY -->

      <div id="div-ilustracaosharpay" class="Hidden"></div>

      <!-- COLUNA DIREITA -->
      <div class="div-coluna">

        <!-- PRIMEIRO CARD -->
        <div class="cursos">
          <div class="icon-cursos">
            <img src="img/index/estetica.png" id="img-logo-cursos">
            <p class="style-maintext"> História da moda</p>
          </div>
          <div class="text-cursos">
            <p class="style-regulartext">
              Our courses effectively and efficiently teach
              reading, listening, and speaking skills. Check out our
            </p>
          </div>
        </div>
        <!-- SEGUNDO CARD -->

        <div class="cursos">
          <div class="icon-cursos">
            <img src="img/index/estetica.png" id="img-logo-cursos">
            <p class="style-maintext"> História da moda</p>
          </div>
          <div class="text-cursos">
            <p class="style-regulartext">
              Our courses effectively and efficiently teach
              reading, listening, and speaking skills. Check out our
            </p>
          </div>
        </div>

      </div>

      <!-- FECHA CONTAINER E INFO -->
    </div>
  </div>

</div>
<!-- SEPARAR A PÁGINA -->
<hr class="hidden">

<!-- ABRE CONTAINER -->
<div id="container-cursos">
  <!-- ABRE DIV DE LIMITAÇÃO -->
  <div id="div-info-cursos">

    <!-- LINHA DO TEMPO -->
    <div class="div-space js-scroll">
      <!-- TITULO E SUBTITULO -->
      <div class="div-text-cursos js-croll">
        <p class="style-titles-main" id="align-aboutus">
          Moda.
        </p>
        <p class="style-regulartext">
          Veja os principais acontecimentos na história da moda.
        </p>
      </div>

      <!-- DIV CARDS -->

      <div id="div-cards-cursos-timeline">

        <a href="" class="cards-timeline">
          <p>StreetWear</p>
        </a>

      </div>

      <!-- FECHA SPACE -->
    </div>

    <!-- ESTETICAS -->
    <div class="div-space js-scroll">
      <!-- TITULO E SUBTITULO -->
      <div class="div-text-cursos">
        <p class="style-titles-main" id="align-aboutus">
          Estética.
        </p>
        <p class="style-regulartext">
          Veja as principais estéticas de High School.
        </p>
      </div>

      <!-- DIV CARDS -->
      <div class="div-cards-cursos js-scroll">

        <a href="" class="cards">
          <p>StreetWear</p>
        </a>

        <a href="" class="cards">
          <p>StreetWear</p>
        </a>

        <a href="" class="cards">
          <p>StreetWear</p>
        </a>

        <a href="" class="cards">
          <p>StreetWear</p>
        </a>

      </div>

      <!-- FECHA SPACE -->
    </div>


    <!-- FECHA CONTAINER INFO -->
  </div>
</div>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/index.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/index_header.css">
<script src="<?= $CURRENT_URL ?>/script/index.js"></script>

<?php
require_once "templates/footer.php";
?>