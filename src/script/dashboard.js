//Variáveis Ranking
const buttons = document.querySelectorAll('.btn-emblems');
const containerRanking = document.querySelector('.container-ranking');

//Variáveis Mostrar/ocultar container-rankings no celular
const btnRanking = document.querySelector('.js-show');
const containerRankings = document.querySelector('.container-rankings');
const btnBack = document.querySelector('.js-hide');

//Variáveis do media query
let isContainerMobile = window.matchMedia('(max-width: 992px)');

//Variáveis das animações dos botões
const emblems = document.querySelectorAll(".js-emblems");
const globalEmblem = emblems[0];
let previousEmblem = globalEmblem;

//Funções Ranking
function getQuizRanking(e) {
    const quizId = e.currentTarget.value;
    const ranking = fetch(`./templates/ranking.php?quizId=${quizId}`);
    ranking
        .then((r) => {
            return r.text();
        })
        .then((body) => {
            containerRanking.innerHTML = body;
        });
}

buttons.forEach((button) => {
    button.addEventListener("click", getQuizRanking);
    console.log('Oi');
})

//Funções Mostrar/ocultar container-rankings no celular
function toggleBtnBack() {
    btnBack.classList.toggle("Hidden");
}

function toggleContainerRankings() {
    containerRankings.classList.toggle("Hidden");
    toggleBtnBack();
}

//Funções do media query
function watchResizing() {
    if (isContainerMobile.matches === false) {
        containerRankings.classList.remove("Hidden");
        containerRankings.classList.remove("Mobile");
        btnRanking.classList.add("Hidden");    
    } else {
        containerRankings.classList.add("Hidden");
        containerRankings.classList.add("Mobile");
        btnRanking.classList.remove("Hidden");   
    }
}

//Funções das animações dos botões
function removeClass(previousEmblem) {
    if(previousEmblem !== "") {
      previousEmblem.classList.remove("increasedWidth");
    }
}

function increaseEmblemWidth(e) {
    removeClass(previousEmblem);
    selectedEmblem = e.currentTarget;
    selectedEmblem.classList.toggle("increasedWidth");
    previousEmblem = selectedEmblem;
  }
  

emblems.forEach((emblem) => {
emblem.addEventListener("click", increaseEmblemWidth);
})

btnRanking.addEventListener("click", toggleContainerRankings);
btnBack.addEventListener("click", toggleContainerRankings);
window.addEventListener("resize", watchResizing);

watchResizing();