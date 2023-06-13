//PEGANDO A QUANT. DE QUESTÕES A SEREM GERADAS
const quantQuestion = document.getElementById('quant');

//BOTÃO QUE ADICIONA MAIS UM FORMULÁRIO PARA CRIAR PERGUNTA
const btnCreateQuestion = document.getElementById('btn-create-question');

btnCreateQuestion.addEventListener('click', createQuestion);

function createQuestion(event) {
    event.preventDefault();
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        for (let i = 0; i < quantQuestion.value; i++) {
            document.getElementById("questions").innerHTML += this.responseText;
        }
        btnCreateQuestion.style.display = "none";
    }
    xhttp.open("GET", "templates/create_question.php");
    xhttp.send();
}
