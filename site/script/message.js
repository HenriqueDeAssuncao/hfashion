//CAIXA DE MENSAGEM
const btnCloseMsg = document.querySelector('.btn-close-msg');
const msg = document.querySelector('.msg');

function closeMessage() {
    msg.classList.add('Hidden');
    msg.style.top = '-100%';
}

btnCloseMsg.addEventListener('click', closeMessage);