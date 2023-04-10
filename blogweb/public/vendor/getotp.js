function copyEmail() {
    const email = document.getElementById('email').value;
    console.log(email);
    document.getElementById('hidden-email').value = email;
}