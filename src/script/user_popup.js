//Variáveis user_popup
let ranking = document.querySelectorAll(".ranking-row");
let userPopup = document.querySelector(".user-popup");
const btnCloseUserPopup = document.querySelector(".btn-close-user-popup");

//Funções user_popup
function getUserId(e) {
  let userId = e.currentTarget.getAttribute("data-parameter");
  return userId;
}

function fetchPopup(userId) {
  const popup = fetch(`./templates/user_popup.php?userId=${userId}`);
    popup
    .then((r) => {
        return r.text();
    })
    .then((body) => {
        userPopup.innerHTML = body;
    });
}

function handlePopup(e) {
  let userId = getUserId(e);
  alert(userId);
}

ranking.forEach((rankingRow) => {
  rankingRow.addEventListener("click", handlePopup);
})

function closeUserPopup() {
  userPopup.classList.toggle("Hidden");
}

btnCloseUserPopup.addEventListener("click", closeUserPopup);