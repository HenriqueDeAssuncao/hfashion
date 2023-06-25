
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    
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

        <p class="style-maintext"> Ana Carolina </p>
        <p class="style-regulartext"> anacarolina@gmail.com </p>
        <a href="http://localhost/hfashion/site/edit_profile.php" id="link_edit_profile">
            editar perfil
        </a>
        

        <div id="div_bio_profile">
            <p class="style-regulartext"> 
             A vida é engual uma montanha russa, um dia 
             a gente estamos emcima e no outro embaixo 
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
          <img src="img/dashboard/relogio.png" id="img_relogio_quiz">
          <p>Uniforme Escolar</p>
        </a>

        <a href="" class="btn_quizzes">
          <img src="img/dashboard/ampulheta.png" id="img_relogio_quiz">
          <p>Mcbling</p>
        </a>

        <a href="" class="btn_quizzes">
          <img src="img/dashboard/trofeu.png" id="img_relogio_quiz">  
          <p>Y2K</p>
        </a>

        <a href="" class="btn_quizzes">
          <img src="img/dashboard/pessoas.png" id="img_relogio_quiz">
          <p>StreetWear</p>
        </a>

      </div>

        </div>

    </div>
</div>



<!-------------------- Conquistas -------------------->


<div id="container_conquistas">
    <div id="info_conquistas">

       <div>
          <p class="style-maintext"> Conquistas </p>
       </div>

    <div id="div_geral">

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
                <p> Y2K </p>
            </div>
            <div class="div_titleBar_conquistas">
                <p> Y2K </p>
            </div>
            <div class="div_titleBar_conquistas">
                <p> Y2K </p>
            </div>
            <div class="div_titleBar_conquistas">
                <p> Y2K </p>
            </div>
        </div>

    </div>


    </div>
</div>






<?php
    require_once("templates/footer.php");
?>