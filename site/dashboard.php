
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


<!-- INSERIR HR PRA SEPARAR -->


<!-------------------- Quizzes -------------------->


<section>

    <div>
        <h1>Quizzes</h1>
<Br>

        <!-- quiz historia -->
        <div>
            <!-- botão precisa redirecionar para a pagina quiz-->
            <button>
                <img src="" alt="relogio">
                <h3>Historia da Moda</h1>
                <p>Veja suas respostas</p>
            </button>
        </div>


        <!-- quiz influencias -->
        <div>
            <!-- botão precisa redirecionar para a pagina quiz-->
            <button>
                <img src="" alt="ampulheta">
                <h3>Influências</h1>
                <p>Veja suas respostas</p>
            </button>
        </div>


        <!-- quiz estilistas -->
        <div>
            <!-- botão precisa redirecionar para a pagina quiz-->
            <button>
                <img src="" alt="pessoas">
                <h3>Estilitas</h1>
                <p>Veja suas respostas</p>
            </button>
        </div>


        <!-- quiz estetica -->
        <div>
            <!-- botão precisa redirecionar para a pagina quiz-->
            <button>
                <img src="" alt="trofeu">
                <h3>Estética</h1>
                <p>Veja suas respostas</p>
            </button>
        </div>

    </div>

</section>


<!-------------------- Emblemas -------------------->


<section>

<br> 
<br>

    <div>
         <h1>Emblemas</h1>
    </div>    
    
<br>
<br>

    <div id='borda'>
        <div></div>
    </div>

</section>
    


<?php
    require_once("templates/footer.php");
?>