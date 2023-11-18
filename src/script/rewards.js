//Mostrar rewards
let btnShowRewards = document.querySelector(".btn-show-rewards");
let Container = document.querySelector(".Container");
let rewards = document.querySelector(".rewards");
let containerRewards = document.querySelector(".container-rewards");

//Adicionar borda
let avatars = document.querySelectorAll(".avatar");
let previousAvatar = "";

//Redirecionar usuário
let btnRedirect = document.querySelector(".btn-resgatar");

function showRewards() {
  containerRewards.classList.toggle("Hidden");
  rewards.classList.add("full-vh");
}

function removeBorder(previousAvatar) {
  if(previousAvatar !== "") {
    previousAvatar.classList.remove("border");
  }
}

function addBorder(e) {
  removeBorder(previousAvatar);
  selectedAvatar = e.currentTarget;
  selectedAvatar.classList.toggle("border");
  previousAvatar = selectedAvatar;
}

function redirect() {
  window.location.href = `dashboard.php`;
}

btnShowRewards.addEventListener('click', showRewards);

avatars.forEach((avatar) => {
  avatar.addEventListener("click", addBorder);
})

btnRedirect.addEventListener("click", redirect);