<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">

    <title>Dashboard</title>
    
<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    $userData = $userDao->verifyToken(true);
?>

</head>
<body>

<!-------------------- PERFIL -------------------->

<section>
    <div>
    
        <!-- colocar input pro usuario alterar a foto -->
<br>
        <img src="#" alt="profile">
        <img src="#" alt="alterar foto">
<br>
        <!-- colocar pra exibir de acordo com oq o user cadastrou -->
<br>
        <h1>Ana Carolina</h1>
        <p>ana.gmail@</p>

        <p>A vida é engual uma montanha russa, um dia <Br>
        a gente estamos em cima e no outro embaixo</p>
    </div>

    <div>
        <!-- onde exibe os emblemas -->
        <br>
        <img src="" alt="emblema 1">
        <img src="" alt="emblema 2">

        <button> Editar Perfil </button>
    </div>
</section>

<Br>
<br>

<hr>

<Br>
<br>


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
    

</body>
</html>

<?php
    require_once("templates/footer.php");
?>