//CAIXA DE MENSAGEM

if (document.querySelector('.msg')) {
    const btnCloseMsg = document.querySelector('.btn-close-msg');
    const msg = document.querySelector('.msg');

    function closeMessage() {
        msg.classList.add('Hidden');
    }

    btnCloseMsg.addEventListener('click', closeMessage);
}

