//Variáveis para a percorrer as perguntas
const containerQuestion = document.querySelector(".container-question");
let quizUrl = document.location.href;
let questionsNumber = new URL(quizUrl).searchParams.get('n');
let questionWeight = new URL(quizUrl).searchParams.get('w');
let index = 0;
let userAnswers = [];

//Variáveis para a barra de progresso e countdown
let barWidth = 0;
let width = 100 / questionsNumber; //porcentagem do width que cada questão corresponde
let progressBar = document.querySelector(".progress-bar");
const countdownElement = document.querySelector(".countdown");

//Função para a barra de progresso
function increaseBarWidth() {
    barWidth += width;

    progressBar.style.width = `${barWidth}%`;
}

//Funções do timer countdown
function resetCountdown() {
    clearInterval(timerInterval);
    countdownElement.textContent = 10;
    timerInterval = setInterval(updateCountdown, 1000);
}
function updateCountdown() {
    let timeLeft = parseInt(countdownElement.textContent);

    if (timeLeft > 0) {
        timeLeft--;
        countdownElement.textContent = timeLeft;
    } else {
        index++;
        userAnswers.push(-1);
        goNextQuestion();
        resetCountdown();
    }

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

    if (index <= questionsNumber - 1) {

        const questionTemplate = fetch(`./templates/question.php?index=${index}`);

        questionTemplate
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Erro na resposta.');
                }
                return response;
            })
            .then((response) => {
                return response.text();
            })
            .then((body) => {
                containerQuestion.innerHTML = body;
                getInputsOptions();
                increaseBarWidth();
            })
            .then(() => {
                resetCountdown();
            })
            .catch((error) => {
                console.error('Erro na requisição do documento', error);
            });


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

let timerInterval = setInterval(updateCountdown, 1000);