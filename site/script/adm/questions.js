const containerQuestion = document.querySelector(".container-question");
const options = document.querySelectorAll(".btn-options");
const where = document.location.href;
let index = 0;

function handleNextQuestion() {
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

options.forEach((option) => {
    option.addEventListener("click", handleNextQuestion);
})