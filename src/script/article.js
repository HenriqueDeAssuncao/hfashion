let query = window.matchMedia('(min-width: 992px)');

function styleElements() {
  let pags = document.querySelectorAll(".container-pag");

  let counter = 0;
  for (let i = 0; i <= pags.length / 2; i++) {

    pags[counter].classList.toggle("row-reverse");

    counter += 2;

    pags[counter - 1].classList.toggle("row");

  }

}

function reload() {
  location.reload();
}

function desktop() {
  if (query.matches) {
    styleElements();
    location.reload();
  }
}

function mobile() {
  if (query.matches === false) {
    styleElements();

  }
}

window.addEventListener("resize", mobile);
window.addEventListener("resize", desktop);
window.addEventListener("resize", reload);

desktop();