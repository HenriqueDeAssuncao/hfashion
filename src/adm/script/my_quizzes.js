
const buttons = document.querySelectorAll(".btn-show-features");

function showFeatures(e) {
    let quizFeatures = e.currentTarget.nextElementSibling;
    quizFeatures.classList.toggle("Hidden");
}

buttons.forEach((button) => {
    button.addEventListener("click", showFeatures);
});

