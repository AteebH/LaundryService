function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('c_password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}