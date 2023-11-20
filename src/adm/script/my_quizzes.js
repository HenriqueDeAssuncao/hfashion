const buttons = document.querySelectorAll(".btn-settings");

function toggleFeatures(e) {
    let quizFeatures = e.currentTarget.nextElementSibling;
    quizFeatures.classList.toggle("Hidden");
}

buttons.forEach((button) => {
    button.addEventListener("click", toggleFeatures);
});

