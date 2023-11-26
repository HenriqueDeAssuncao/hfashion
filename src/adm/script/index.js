//Configurações
const buttons = document.querySelectorAll(".btn-settings");

//Formulário
let btnsAddForm = document.querySelectorAll(".btn-add-form");
let form = document.querySelector(".form");
let containerArticleForm = document.querySelector(".container-article-form");
let hrefUrl = document.location.href;

let btnCloseForm;

//Configurações
function toggleFeatures(e) {
    let quizFeatures = e.currentTarget.nextElementSibling;
    quizFeatures.classList.toggle("Hidden");
}

buttons.forEach((button) => {
    button.addEventListener("click", toggleFeatures);
});

//Formulário
function fetchForm(quizId) {

    const articleForm = fetch(`templates/form.php?quizId=${quizId}`);

    articleForm
        .then((r) => {
            return r.text();
        })
        .then((body) => {
            form.innerHTML = body;
        });
}

function getQuizId(e) {
    let quizId = e.target.getAttribute("data-parameter");
    return quizId;
}

function toggleForm() {
    containerArticleForm.classList.toggle("Hidden");
}

function getBtnClose() {
    btnCloseForm = document.querySelector(".btn-close-form");
    btnCloseForm.addEventListener("click", toggleForm);
}

function handleClick(e) {
    e.preventDefault();
    quizId = getQuizId(e);
    toggleForm();
    getBtnClose();
    fetchForm(quizId);
}

btnsAddForm.forEach((btnAddForm) => {
    btnAddForm.addEventListener("click", handleClick);
})