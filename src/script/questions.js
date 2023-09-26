//Variáveis para a percorrer as perguntas
const containerQuestion = document.querySelector(".container-question");
let quizUrl = document.location.href;
let questionsNumber = new URL(quizUrl).searchParams.get('n');
let questionWeight = new URL(quizUrl).searchParams.get('w');
let index = 0;
let userAnswers = [];

//Variável para a barra de progresso
let progressBar = document.querySelector(".progress-bar");
let progressBarWidth = 0;
let increasingValue = 100/questionsNumber;

//Função para a barra de progresso
function increaseProgressBar() {
    
    progressBarWidth += increasingValue;
    let width = `${progressBarWidth}%`;
    console.log(width);
    return width;
}

//Funções para percorrer as perguntas
function getAnswerIndex() {
    const userAnswer = document.querySelector('input[type="radio"]:checked');
    if (userAnswer === null) {
        window.alert("Selecione uma resposta!");
        return false;
    } else {
        userAnswers.push(userAnswer.value);
        return true;
    }
}

function handleNextQuestion() {
    if (!getAnswerIndex()) {
        return;
    }
    index++;
    goNextQuestion();
}

function goNextQuestion() {
    let width = increaseProgressBar();

    if (index <= questionsNumber-1) {
        const questionTemplate = fetch(`./templates/question.php?index=${index}&width=${width}`);

        questionTemplate
        .then((r) => {
            return r.text();
        })
        .then((body) => {
            containerQuestion.innerHTML = body;
        })
        .then(() => {
            getInputsOptions();
        })
        
   
    } else {
        stringUserAnswers = userAnswers.toString();
        window.location.href = `process/score_process.php?n=${questionsNumber}&a=${stringUserAnswers}&w=${questionWeight}`; 
    }
    
}

function getInputsOptions() {
    let inputsOptions = document.querySelectorAll(".inputs-options");
    inputsOptions.forEach((inputOption) => {
        inputOption.addEventListener("click", handleNextQuestion);
    })
}

getInputsOptions();