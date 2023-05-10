function ativate(){
    var teste = 0;
    var input = document.querySelector(".campo");
    if(input.autofocus == false){
        input.autofocus = true;
        input.classList.remove("desactive");
        input.classList.add("active");
        teste = 1;
    }
    else if(input.autofocus == true){
        input.autofocus = false;
        input.classList.remove("active");
        input.classList.add("desactive");
    }
    return teste;
}


function verOferta(){
    var modal = document.querySelector(".modal_fundo");
    var modal_info = document.querySelector(".modal_verOferta");
    modal.classList.remove("none");
    modal_info.classList.remove("none");
}
function fecharModal(){
    var modal = document.querySelector(".modal_fundo");
    var modal_info = document.querySelector(".modal_verOferta");
    modal_info.classList.add("none");
    modal.classList.add("none");
}



function adicionar(){
    var modal = document.querySelector(".modal_fundo");
    var modal_info = document.querySelector(".modal_adiconar");
    modal.classList.remove("none");
    modal_info.classList.remove("none");
}
function fecharModal_add(){
    var modal = document.querySelector(".modal_fundo");
    var modal_info = document.querySelector(".modal_adiconar");
    modal.classList.add("none");
    modal_info.classList.add("none");
}



function abrir_filtro(){
    var modal = document.querySelector(".modal_fundo");
    var modal_info = document.querySelector(".campo_filtro");

    modal.classList.remove("none");
    modal_info.classList.remove("none");
}

function fechar_filtro(){
    var modal = document.querySelector(".modal_fundo");
    var modal_info = document.querySelector(".campo_filtro");

    modal.classList.add("none");
    modal_info.classList.add("none");
}

function mudar_tipo(){
    var modal = document.querySelector(".modal_fundo");
    var modal_info = document.querySelector(".modal_mudar_tipo");

    modal.classList.remove("none");
    modal_info.classList.remove("none");
}