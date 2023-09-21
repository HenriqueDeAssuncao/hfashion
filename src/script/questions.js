const containerQuestion = document.querySelector(".container-question");
let quizUrl = document.location.href;
let questionsNumber = new URL(quizUrl).searchParams.get('n');
let questionWeight = new URL(quizUrl).searchParams.get('w');
let index = 0;
let userAnswers = [];

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
    if (index <= questionsNumber-1) {
        const questionTemplate = fetch(`./templates/question.php?index=${index}`);

        questionTemplate
        .then((r) => {
            return r.text();
        })
        .then((body) => {
            containerQuestion.innerHTML = body;
        })
        .then(() => {
            getInputsOptions();
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