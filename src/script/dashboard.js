//Ranking
const buttons = document.querySelectorAll('.btn-emblems');
const containerRanking = document.querySelector('.container-ranking');

//Mostrar/ocultar container-rankings no celular
const btnRanking = document.querySelector('.js-show');
const containerRankings = document.querySelector('.container-rankings');
const btnBack = document.querySelector('.js-hide');

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

btnRanking.addEventListener("click", toggleContainerRankings);
btnBack.addEventListener("click", toggleContainerRankings);