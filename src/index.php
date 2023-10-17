
<?php
require_once "templates/header.php";
?>

</div>

<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/index.css">
<link rel="stylesheet" href="<?= $CURRENT_URL ?>/css/index_header.css">

<div id="container-banner"
  style="background-image: url(<?= $CURRENT_URL ?>/img/index/banner.png); width: 100%; height:100%;">
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
      <p class="style-titles-main">O que você vai aprender?</p>
    </div>


    <div id="div-topicos">

      <div class="div-coluna">

        <!-- PRIMEIRO CARD -->
        <div class="cursos">
          <div class="icon-cursos">
            <img src="img/index/time.png" id="img-logo-cursos">
            <p class="style-maintext"> Linha do Tempo</p>
          </div>
          <div class="text-cursos">
            <p class="style-regulartext">
              Our courses effectively and efficiently teach
              reading, listening, and speaking skills. Check out our
            </p>
          </div>
        </div>

        <div class="cursos">
          <div class="icon-cursos">
            <img src="img/index/esteticas.png" id="img-logo-cursos">
            <p class="style-maintext"> Estética</p>
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
            <img src="img/index/influ.png" id="img-logo-cursos">
            <p class="style-maintext"> Influência</p>
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

<!-- LINHA DO TEMPO -->

<!-- ABRE DIV DE LIMITAÇÃO -->
<div id="div-info-timeline" class="hidden">
  <!-- TITULO E SUBTITULO -->
  <p class="style-titles-main" id="align-aboutus">
    Moda.
  </p>
  <p class="style-regulartext">
    Veja os principais acontecimentos na história da moda.
  </p>

  <!-- DIV LINK TIMELINE -->
  <div id="div-timeline"
    style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/teatro.png);">
    <div id="div-text-timeline">
      <p class="style-minimal" style="color: #FFF">1/4</p><br>
      <div id="timeline-text-limitacion">
        <p id="style-timeline">Linha do tempo</p>
      </div>
      <br>
      <p class="style-minimal" style="color: #FFF">textotextotexto</p>
    </div>
  </div>

</div>

<div class="container-cursos" id="hiddenpc">
  <div class="div-info-cursos">
    <!-- TITULO E SUBTITULO -->
    <div class="div-text-cursos">
      <p class="style-titles-main" id="align-aboutus">
        História da Moda.
      </p>
      <p class="style-regulartext">
        Veja a evolução da moda ao longo dos anos.
      </p>
    </div>

    <!-- DIV CARDS -->
    <div class="div-cards-cursos-influ js-scroll">
      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/teat.png); background-repeat: no-repeat;">
        </div>
        <div class="div-text-card">
          <p class="style-minimal">1/1</p>
          <p class="style-regulartext">Linha do Tempo</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ESTETICAS -->
<div class="container-cursos">
  <div class="div-info-cursos">
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
      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/street.png); background-repeat: no-repeat;">
        </div>
        <div class="div-text-card">
          <p class="style-minimal">1/4</p>
          <p class="style-regulartext">StreetWear</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/y2k.png); background-repeat: no-repeat;">
        </div>
        <div class="div-text-card">
          <p class="style-minimal">2/4</p>
          <p class="style-regulartext">Y2K</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/mc.png); background-repeat: no-repeat;">
        </div>
        <div class="div-text-card">
          <p class="style-minimal">3/4</p>
          <p class="style-regulartext">McBling</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/uni.png); background-repeat: no-repeat;">
        </div>
        <div class="div-text-card">
          <p class="style-minimal">4/4</p>
          <p class="style-regulartext">Uniforme Escolar</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- INFLUENCIA -->
<div class="container-cursos">
  <div class="div-info-cursos">
    <!-- TITULO E SUBTITULO -->
    <div class="div-text-cursos">
      <p class="style-titles-main" id="align-aboutus">
        Influência.
      </p>
      <p class="style-regulartext">
        Veja as principais influências de High School.
      </p>
    </div>

    <!-- DIV CARDS -->
    <div class="div-cards-cursos-influ js-scroll">
      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/musica.png); background-repeat: no-repeat;">
        </div>
          <div class="div-text-card">
          <p class="style-minimal">1/3</p>
          <p class="style-regulartext">Música</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/esporte.png); background-repeat: no-repeat;">
        </div>
        <div class="div-text-card">
          <p class="style-minimal">2/3</p>
          <p class="style-regulartext">Esporte</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

      <div class="card">
        <div class="div-img-card"
          style="background-image: url(<?= $CURRENT_URL ?>/img/index/btn/cinema.png); background-repeat: no-repeat;">
        </div> 
        <div class="div-text-card">
          <p class="style-minimal">3/3</p>
          <p class="style-regulartext">Cinema</p>
          <p class="style-minimal">textotextotexto</p>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="<?= $CURRENT_URL ?>/script/index.js"></script>

<?php
require_once "templates/footer.php";
?>