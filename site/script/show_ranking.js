const buttons = document.querySelectorAll('.btn-emblems');

function teste(e) {
    console.log(e.currentTarget.value);
}

buttons.forEach((button) => {
    button.addEventListener("click", teste);
})