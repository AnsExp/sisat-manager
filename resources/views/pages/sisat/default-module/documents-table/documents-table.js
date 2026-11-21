document.querySelectorAll('button.button-copy-sign').forEach(button => {
    const sign = button.dataset.sign;
    navigator.clipboard.writeText(sign);
})