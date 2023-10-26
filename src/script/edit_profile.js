let images = document.querySelectorAll(".img");
let previousImg = "";

function removeBorder(previousImg) {
  if(previousImg !== "") {
    previousImg.classList.remove("border");
  }
}

function addBorder(e) {
  removeBorder(previousImg);
  selectedImg = e.currentTarget;
  selectedImg.classList.toggle("border");
  previousImg = selectedImg;
}

images.forEach((image) => {
  image.addEventListener("click", addBorder);
})