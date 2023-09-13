<link rel="stylesheet" type="text/css" href="css/dashboard_n.css">

<?php
require_once("templates/header.php");
require_once("models/User.php");
$userData = $userDao->verifyToken(true);
?>


<!-------------------- PERFIL -------------------->


<div id="container_profile">
  <div id="info_profile">

    <div id="div_img_profile">
      <img src="img/dashboard/cadastro.png" alt="" id="img_profile">
    </div>

    <p class="style-maintext"><?= $userData->getNickname() ?></p>
    <p class="style-regulartext"><?= $userData->getEmail() ?></p>
    <!--
     <a href="http://localhost/hfashion/site/edit_profile.php" id="link_edit_profile">
      editar perfil
    </a> -->


    <div id="div_bio_profile">
      <p class="style-regulartext">
        <?= $userData->getBio() ?>
      </p>
    </div>

    <div id="align_div_emblemas">
      <img src="img/dashboard/emblema1.png" class="img_emblema">
      <img src="img/dashboard/emblema2.png" class="img_emblema">
      <img src="img/dashboard/emblema3.png" class="img_emblema">
      <img src="img/dashboard/emblema3.png" class="img_emblema">
    </div>

    <!--
        <div id="div_btn-roll">
            <a href="http://localhost/hfashion/site/edit_profile.php" id="btn-roll">
            <img src="img/dashboard/camera.png" id="img_camera">
            EDITAR PERFIL
            </a>
        </div>
-->
  </div>
</div>


<!-------------------- Quizzes -------------------->


<div id="container_quiz">
  <div id="info_quiz">

    <div id="align_title_quiz">
      <p class="style-maintext"> Quizzes </p>
    </div>

    <div id="div_btn">

      <!-- DIV BOTÃO QUIZZES -->
      <div class="div_btn_quizzes js-scroll">

        <a href="" class="btn_quizzes">
          <img src="img/dashboard/relogio.png" class="img_icones_quiz">
          <p>Uniforme Escolar <br>
            <b>veja suas respostas</b>
          </p>
        </a>

        <a href="" class="btn_quizzes">
          <img src="img/dashboard/ampulheta.png" class="img_icones_quiz">
          <p>Mcbling <br>
            <b>veja suas respostas</b>
          </p>
        </a>

        <a href="" class="btn_quizzes">
          <img src="img/dashboard/trofeu.png" class="img_icones_quiz">
          <p>Y2K <br>
            <b>veja suas respostas</b>
          </p>
        </a>

        <a href="" class="btn_quizzes">
          <img src="img/dashboard/pessoas.png" class="img_icones_quiz">
          <p>StreetWear <Br>
            <b>veja suas respostas</b>
          </p>
        </a>

      </div> <!-- FECHA DIV_BTN_QUIZZES -->

    </div> <!-- FECHA DIV_BTN -->

  </div> <!-- FECHA INFO_QUIZ -->
</div> <!-- FECHA CONTAINER_QUIZ -->


<!-------------------- Conquistas -------------------->


<div id="container_conquistas">
  <div id="info_conquistas">

    <div id="align_title_conquistas">
      <p class="style-maintext"> Conquistas </p>
    </div>

    <div id="div_geral_progresso">

      <!-- DIV DAS IMAGENS -->
      <div id="div_img_conquistas">
        <div class="background">
          <img src="img/dashboard/ringbox.png">
        </div>
        <div class="background">
          <img src="img/dashboard/cap.png">
        </div>
        <div class="background">
          <img src="img/dashboard/seaker.png">
        </div>
        <div class="background">
          <img src="img/dashboard/purse.png">
        </div>
      </div>

      <!-- DIV DA BARRINHA DE PROGRESSO -->
      <div id="div_progresso_conquistas">
        <div class="div_titleBar_conquistas">
          <!-- deu problema no css ent tive que estilizar
              dentro da propria tag <p> (isso é temporario)
              -->
          <p style="font-weight: 600; color: #424245;">
            Y2K <br>
            <img src="img/dashboard/barra.png" class="img_barra_progresso">
          </p>
        </div>
        <div class="div_titleBar_conquistas">
          <p style="font-weight: 600; color: #424245;">
            STREETWEAR
            <img src="img/dashboard/barra.png" class="img_barra_progresso">
          </p>
        </div>
        <div class="div_titleBar_conquistas">
          <p style="font-weight: 600; color: #424245;">
            UNIFORME ESCOLAR
            <img src="img/dashboard/barra.png" class="img_barra_progresso">
          </p>
        </div>
        <div class="div_titleBar_conquistas">
          <p style="font-weight: 600; color: #424245;">
            MCBLING
            <img src="img/dashboard/barra.png" class="img_barra_progresso">
          </p>

        </div>
      </div>


    </div> <!-- FECHA DIV_GERAL_PROGRESSO -->

    <!-- BOTÃO CONSULTAR RANKING -->
    <div id="div_btn_consulRanking">
      <a href="" id="btn_consulRanking">
        <p id="txt_consulRanking"> Consultar Ranking </p>
      </a>
    </div>

  </div> <!-- FECHA INFO_CONQUISTAS -->
</div> <!-- FECHA CONTAINER_CONQUISTAS -->




<?php
require_once("templates/footer.php");
?>