//Primeiramente eu removo o botão de fechar do primeiro template_question:
let firstButtonDelete = document.querySelector('.btn-delete-template-question');
firstButtonDelete.classList.add('Hidden');

//Botões
const btnGetQuestionTemplate = document.querySelector('.btn-get-question-template');
const btnSubmit = document.querySelector('.btn-submit');
//Inputs para eu verificar se estão vazios:
let inputsArray;
//Botões de deletar questões:
let buttonsDelete;

const questionsContainer = document.querySelector('.questions-container');
//url atual
const href = document.location.href;
//formulário
const form = document.querySelector('.js-form');
//para contar quantas questões estão sendo adicionadas
let questionsTemplatesCounter = 1;

function getQuestionTemplate() {
    const questionTemplate = fetch(`${href}../../templates/question_form_group.php?questions=`);

    questionTemplate
        .then((r) => {
            return r.text();
        })
        .then((body) => {
            let div = document.createElement('div');
            div.innerHTML += body;
            questionsContainer.appendChild(div);
            updateInputs();
            updateDeleteButtons();
            questionsTemplatesCounter++;
        });
}

function setInputs(inputs) {
    inputsArray = inputs;
}

function updateInputs() {
    let inputs = document.querySelectorAll('.js-inputs');
    setInputs(inputs);
}

function updateDeleteButtons() {
    buttonsDelete = document.querySelectorAll('.btn-delete-template-question');
    buttonsDelete.forEach((btn) => {
        btn.addEventListener("click", handleDelete);
    });
}

function handleGet(e) {
    e.preventDefault();
    getQuestionTemplate();
}

function handleDelete(e) {
    e.preventDefault();
    deleteTemplateQuestion(e);
}

function deleteTemplateQuestion(e) {
    const element = e.target.parentElement.parentElement;
    element.remove();
    questionsTemplatesCounter--;
    updateInputs();
}

function submitForm(e) {
    let condition = true;
    if (questionsTemplatesCounter >= 5) {
        inputsArray.forEach((input) => {
            if (input.value === "" || input.value === 0) {
                condition = false;
                e.preventDefault();
            }
        });
        if (condition) {
            form.setAttribute('action', `${href}./../process/adm_questions_process.php?questionsNumber=${questionsTemplatesCounter}`);
        } else {
            alert('Todos os campos são obrigatórios');
        }
    } else {
        e.preventDefault();
        alert('O quiz deve ter no mínimo 5 perguntas!');
    }
}

btnGetQuestionTemplate.addEventListener("click", handleGet);
btnSubmit.addEventListener("click", submitForm);