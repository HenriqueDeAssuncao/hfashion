<!DOCTYPE html>
<html>
<head>
    <title>Atualização de CSS Assíncrona</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div id="elementoParaAtualizar">
    <p>Este é o conteúdo original.</p>
</div>

<button id="botaoAtualizar">Clique para atualizar</button>

<script>
$(document).ready(function() {
    // Manipulador de clique para o botão
    $("#botaoAtualizar").click(function() {
        // Simulando uma operação assíncrona (por exemplo, uma requisição AJAX)
        setTimeout(function() {
            // Atualizar o CSS do elemento
            $("#elementoParaAtualizar").css({
                "background-color": "lightblue",
                "color": "blue",
                "font-weight": "bold"
            });

            // Atualizar o conteúdo do elemento
            $("#elementoParaAtualizar p").text("CSS atualizado de forma assíncrona!");
        }, 2000); // Tempo de espera de 2 segundos (simulando uma operação demorada)
    });
});
</script>

</body>
</html>


