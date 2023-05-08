
var login_event = document.querySelector(".login");
var cadastro_event = document.querySelector(".cadastro");
var log = document.querySelector(".main .log");
var cad = document.querySelector(".main .cad");
var teste = 1;

/*
function login(){
    var user_log = log.querySelector("#user");
    var senha_log = log.querySelector("#senha");

    
    var user_text = user_log.value;
    var senha_text = senha_log.value;


    if(user_text=="" || user_text == " "){
        user_log.classList.add("erro");
    }
    else{
        user_log.classList.remove("erro");
    }

    if(senha_text == "" || senha_text == " "){
        senha_log.classList.add("erro");
    }
    else{
        senha_log.classList.remove("erro");
    }


    if((senha_text == "" || senha_text == " ") || (user_text=="" || user_text == " ")){
        login_event.setAttribute("href", "#");
    } else{
        login_event.setAttribute("href", "serviços.html");
    }
}
*/

function ver_senha(){
    var senha_log = log.querySelector("#senha");
    var teste = senha_log.classList.contains("texto_p");
    console.log(teste)
    if(teste == false){
        var senha_log = log.querySelector("#senha");
        senha_log.type = "text";
        senha_log.classList.remove("pass");
        senha_log.classList.add("texto_p");
    }
    else{
        var senha_log = log.querySelector("#senha");
        senha_log.type = "password";
        senha_log.classList.remove("texto_p");
        senha_log.classList.add("pass");
    }
}

/*
function cadastro(){
    var user_cad = cad.querySelector(".cad .user");
    var email_cad = cad.querySelector(".cad .email");
    var senha_cad = cad.querySelector(".cad .senha");
    var repSenha_cad = cad.querySelector(".cad .rep_senha");
    var cep = cad.querySelector(".cad .cep");
    
    var email_text = email_cad.value;
    var user_text = user_cad.value;
    var senha_text = senha_cad.value;
    var repSenha_text = repSenha_cad.value;
    var cep_text = cep.value;

    var teste_arroba = email_text.indexOf("@");
    var teste_ponto = email_text.indexOf(".");
    var teste_espaço = email_text.indexOf(" ");


    if(email_text == "" || email_text == " "){
        email_cad.classList.add("erro");
    }
    else{
        email_cad.classList.remove("erro");

        if((teste_arroba == -1) || (teste_ponto == -1)){
            email_cad.value = "";
            email_cad.setAttribute("placeholder", "Email inválido");
            email_cad.classList.add("erro");
            console.log("tese")
        }else{
            if((email_text[teste_arroba-1] == "" || email_text[teste_arroba-1] == " ") || (email_text[teste_arroba+1] == "" || email_text[teste_arroba+1] == " ") || (email_text[teste_ponto-1] == "" || email_text[teste_ponto-1] == " ") || (email_text[teste_ponto+1] == "" || email_text[teste_ponto+1] == " ") || (teste_espaço != -1)){
                email_cad.value = "";
                email_cad.setAttribute("placeholder", "Email inválido");
                email_cad.classList.add("erro");
            }
        }
    }


    if(user_text=="" || user_text == " "){
        user_cad.classList.add("erro");
    }
    else{
        user_cad.classList.remove("erro");
    }


    if(senha_text == "" || senha_text == " "){
        senha_cad.classList.add("erro");
    }
    else{
        senha_cad.classList.remove("erro");
    }


    if(repSenha_text == "" || repSenha_text == " "){
        repSenha_cad.classList.add("erro");
        if(repSenha_text != senha_text){
            senha_cad.value = "hdhd";
            repSenha_cad.setAttribute("placeholder", "As senhas não diferentes")
        }
    }

    else{
        repSenha_cad.classList.remove("erro");
        if(repSenha_text != senha_text){
            repSenha_cad.value = "";
            repSenha_cad.setAttribute("placeholder", "As senhas não diferentes");
            repSenha_cad.classList.add("erro");
        }
    }
    

    if(cep_text == "" || cep_text == " "){
        cep.classList.add("erro");
    }
    else{
        cep.classList.remove("erro");
        if(cep_text.length != 8){
            cep.value = "";
            cep.setAttribute("placeholder", "CEP inválido");
            cep.classList.add("erro");
        }
        if(cep_text == "00000000"){
            cep.value = "";
            cep.setAttribute("placeholder", "00000000 não é um CEP válido");
            cep.classList.add("erro");
        }
    }


    if((senha_text == "" || senha_text == " ") || 
    (user_text =="" || user_text == " ") ||
    (email_text =="" || email_text == " ") || 
    (repSenha_text =="" ||repSenha_text  == " ") || 
    (cep_text =="" || cep_text == " ")){
        cadastro_event.setAttribute("href", "#");
    } else{
        cadastro_event.setAttribute("href", "serviços.html");
    }
}


function ver_senha_cad(){
    var senha_cad = cad.querySelector(".cad .senha");
    var repSenha_cad = cad.querySelector(".cad .rep_senha");
    var teste = senha_cad.classList.contains("texto_p");

    if(teste == false){
        senha_cad.type = "text";
        senha_cad.classList.remove("pass");
        senha_cad.classList.add("texto_p");

        repSenha_cad.type = "text";
        repSenha_cad.classList.remove("pass");
        repSenha_cad.classList.add("texto_p");
    }
    else{
        senha_cad.type = "password";
        senha_cad.classList.remove("texto_p");
        senha_cad.classList.add("pass");

        repSenha_cad.type = "password";
        repSenha_cad.classList.remove("pass");
        repSenha_cad.classList.add("texto_p");
    }
}
*/

function slide_img(){
    let img = document.querySelector("#slideImg");
    img.classList.toggle("img-slided");
    
}