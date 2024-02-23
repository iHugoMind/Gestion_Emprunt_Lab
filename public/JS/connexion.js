const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
});

//Validation coté client

document.querySelector('form').addEventListener('submit', function(event) {
    let email = document.querySelector('input[name="email"]').value;
    let password = document.querySelector('input[name="password"]').value;
    let error = '';

    if (email.trim() === '' || password.trim() === '') {
        error = 'Veuillez remplir tous les champs.';
    }

    if (error !== '') {
        event.preventDefault(); // Empêche l'envoi du formulaire
        document.querySelector('.error').textContent = error;
    }
});

//Validation mot de passe 

function validatePassword(password) {
    // Au moins 8 caractères
    if (password.length < 8) {
        return "Le mot de passe doit contenir au moins 8 caractères.";
    }
    // Au moins une lettre minuscule et une lettre majuscule
    if (!/[a-z]/.test(password) || !/[A-Z]/.test(password)) {
        return "Le mot de passe doit contenir au moins une lettre minuscule et une lettre majuscule.";
    }
    // Au moins un chiffre
    if (!/\d/.test(password)) {
        return "Le mot de passe doit contenir au moins un chiffre.";
    }
    // Au moins un caractère spécial
    if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
        return "Le mot de passe doit contenir au moins un caractère spécial.";
    }
    return ""; // Le mot de passe est valide
}

