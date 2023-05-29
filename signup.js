

function checkName(event) {
    const input = event.currentTarget;
    
    /* if(formStatus[input.name] = /^[a-zA-Z]+$/.test(input.value)) { */
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.parentNode.classList.remove('errori');
    } else {
        input.parentNode.parentNode.classList.add('errori');
        input.parentNode.parentNode.classList.remove('hidden-form');
    }
}

function checkSurname(event) {
    const input = event.currentTarget;
    
    /* if(formStatus[input.name] = /^[a-zA-Z]+$/.test(input.value)) { */
    if (formStatus[input.surname] = input.value.length > 0) {
        input.parentNode.parentNode.classList.remove('errori');
    } else {
        input.parentNode.parentNode.classList.add('errori');
        input.parentNode.parentNode.classList.remove('hidden-form');
    }
}

function jsonCheckUsername(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('errori');
    } else {
        document.querySelector('.username').classList.add('errori');
        document.querySelector('.username').classList.remove('hidden-form');
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
    }

}

function jsonCheckEmail(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errori');
    } else {
        document.querySelector('.email').classList.add('errori');
        document.querySelector('.email').classList.remove('hidden-form');
        document.querySelector('.email span').textContent = "Email già utilizzata";
    }

}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.parentNode.classList.add('errori');
        input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        formStatus.username = false;
    } else {
        fetch("checkUserName.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errori');
        document.querySelector('.email').classList.remove('hidden-form');
        formStatus.email = false;

    } else {
        fetch("checkEmail.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errori');
    } else {
        document.querySelector('.password').classList.add('errorj');
        document.querySelector('.password').classList.remove('hidden-form');
    }

}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('errori');
    } else {
        document.querySelector('.confirm_password').classList.add('errori');
        document.querySelector('.confirm_password').classList.add('hidden-form');
    }
}

let formStatus = {};



document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);

