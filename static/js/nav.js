var nav = document.querySelector("nav");

var item_nav = nav.querySelectorAll("a");
var h1 = document.querySelector("h1");

for(var n = 0; n<item_nav.length ; n++){
    var text = item_nav[n].textContent
    console.log(text)

    if(text == h1.textContent){
        item_nav[n].classList.add("cor_nav");
    }
}

function testar_options(){
    var options = document.querySelector(".opçoes");
    var teste = options.classList.contains("op_none");
    return teste;
}

function abrir_options(){
    var options = document.querySelector(".opçoes");
    if(options.classList.contains("op_none")){
        options.classList.remove("op_none");
    }
    else{
        options.classList.add("op_none");
    }
    testar_options();
}

function fechar_op(){
    var teste = testar_options();
    if(teste==false){
        var options = document.querySelector(".opçoes");
        options.classList.add("op_none");
        console.log(teste)
    }
}