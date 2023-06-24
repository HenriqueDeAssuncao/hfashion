const containerQuestion = document.querySelector(".container-question");
const btnContinue = document.querySelector(".btn-continue");
let index = 0;

function handleNextQuestion(e) {
    e.preventDefault();
    index++;
    goNextQuestion();
}

function goNextQuestion() {
    const questionTemplate = fetch(`./templates/question.php?index=${index}`);

    questionTemplate
        .then((r) => {
            return r.text();
        })
        .then((body) => {
            containerQuestion.innerHTML = body;
        })
}

btnContinue.addEventListener("click", handleNextQuestion);
