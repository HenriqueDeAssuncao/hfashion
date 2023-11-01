const buttons = document.querySelectorAll('.btn-emblems');
const containerRanking = document.querySelector('.container-ranking');

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
})