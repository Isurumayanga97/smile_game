function checkPasswordConfirmation() {
    const password = document.querySelector('input[name=password]');
    const confirm = document.querySelector('input[name=c_password]');

    if (confirm.value === password.value) {
        document.getElementById('confirm-text').style.display = 'none';
    } else {
        $('#confirm-text').html('password confirmation failed!').css('display', 'block');
    }
}

function closeErrorModal() {
    document.getElementById('loginErrorModal').style.display = 'none';
}
