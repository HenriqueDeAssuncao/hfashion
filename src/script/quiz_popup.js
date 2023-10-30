let quizzesCards = document.querySelectorAll(".card");
let QuizPopup = document.querySelector(".quiz-popup");
let containerQuizPopup = document.querySelector(".container-quiz-popup");

function getIndex(e) {
  let index = e.currentTarget.getAttribute("data-parameter");
  return index;
}

function fetchPopup(index) {
  const popup = fetch(`./templates/quiz_popup.php?index=${index}`);
    popup
    .then((r) => {
        return r.text();
    })
    .then((body) => {
        containerQuizPopup.innerHTML = body;
    });
}

function toggleHiddenClass() {
  containerQuizPopup.classList.toggle("Hidden");
  QuizPopup.classList.toggle("Hidden");
}


function handlePopup(e) {
  e.preventDefault();
  let index = getIndex(e);
  fetchPopup(index);
  toggleHiddenClass();
}


quizzesCards.forEach((quizCard) => {
  quizCard.addEventListener("click", handlePopup);
})