/*Form Variables*/
let allCamps = document.getElementsByTagName("input");
for (camp of allCamps) {
    camp.addEventListener("keypress", checkEnter);
}

let sendButton = document.getElementById("sendButton");
let nameCamp = document.getElementById("nameCamp");
let emailCamp = document.getElementById("emailCamp");
let messageCamp = document.getElementById("messageCamp");
/*End of form Variables*/

/*Error Messages*/
let emptyCampErrorLog = "Esse campo não pode estar vazio!";
let wrongEmailErrorLog = "Formato do e-mail inválido!";

/*End of error messages*/

sendButton.addEventListener("click", sendEmail);

function checkEnter(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        event.target.nextElementSibling.nextElementSibling.focus();
        console.log("oi");
    }
}


function emailValidation(email) {
    specialCharacters = [".", "-", "_"];
    count_arrobas = 0;
    invalidPositions = 0;
    for (index in email) {
        if (email[index] == "@") {
            count_arrobas++;
            if (index == 0 || index == (email.length - 1)) {
                invalidPositions++;
            }
            else {
                for (char of specialCharacters) {
                    if (email[Number(index) + 1] === char || email[Number(index) - 1] === char) {
                        invalidPositions++;
                    }
                }
            }
        }

        if (email[index] == ".") {
            if (email[Number(index) + 1] == "." || email[Number(index) + 1] == "-" || email[Number(index) + 1] == "_") {
                invalidPositions++;
            }
        }
        if (email[index] == "_") {
            if (email[Number(index) + 1] == "." || email[Number(index) + 1] == "-" || email[Number(index) + 1] == "_") {
                invalidPositions++;
            }
        }
        if (email[index] == "-") {
            if (email[Number(index) + 1] == "." || email[Number(index) + 1] == "-" || email[Number(index) + 1] == "_") {
                invalidPositions++;
            }
        }

        if (email[index] == "#") {
            invalidPositions++;
        }
    }

    if (email[0] === "." || email[0] === "_" || email[0] === "-") {
        invalidPositions++;
    }
    else if (email[email.length - 1] === "." || email[email.length - 1] === "_" || email[email.length - 1] === "-") {
        invalidPositions++;
    }

    if (count_arrobas != 1 || invalidPositions != 0) {
        return 0;
    }
    else {
        return 1;
    }

}


function validForm() {
    let errors = 0;
    if (nameCamp.value == "") {
        nameCamp.nextElementSibling.innerHTML = emptyCampErrorLog;
        nameCamp.classList.add("wrong-input", "animated");
        errors++;
        setTimeout(() => { nameCamp.classList.remove("animated") }, 500);
    }
    else {
        nameCamp.nextElementSibling.innerHTML = "";
        nameCamp.classList.remove("wrong-input");
    }

    if (emailValidation(emailCamp.value) == 0 || emailCamp.value == 0) {
        if (emailCamp.value == "") {
            emailCamp.nextElementSibling.innerHTML = emptyCampErrorLog;
        }
        else if (emailValidation(emailCamp.value) == 0) {
            emailCamp.nextElementSibling.innerHTML = wrongEmailErrorLog;
        }
        emailCamp.classList.add("wrong-input", "animated");
        errors++;
        setTimeout(() => { emailCamp.classList.remove("animated") }, 500);
    }
    else {
        emailCamp.nextElementSibling.innerHTML = "";
        emailCamp.classList.remove("wrong-input");
    }



    if (messageCamp.value == "") {
        messageCamp.nextElementSibling.innerHTML = emptyCampErrorLog;
        messageCamp.classList.add("wrong-input", "animated");
        errors++;
        setTimeout(() => { messageCamp.classList.remove("animated") }, 500);
    }
    else {
        messageCamp.nextElementSibling.innerHTML = "";
        messageCamp.classList.remove("wrong-input");
    }

    return errors;
}

function sendEmail(event) {
    event.preventDefault();
    let errors = validForm();
    if (errors == 0) {
        setTimeout(() => {
            let messageSendSignal = document.getElementById("messageSendSignal");
            messageSendSignal.classList.add("slide");
            nameCamp.value = "";
            emailCamp.value = "";
            messageCamp.value = "";
        }, 100)
        setTimeout(() => {
            messageSendSignal.classList.remove("slide");
        }, 5000)
    }
}