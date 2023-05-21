<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

*{
    margin: 0;
    padding: 0;
}

body{
    font-size: 18px;
    font-family: 'Roboto',sans-serif;
}


main{
    width: 100%;
    padding: 3% 2% 2% 2%;
    box-sizing: border-box;
    height: fit-content;
}

/*Pesquisa*/

.titulo{
    margin-bottom: 20px;
}
.titulo p{
    color: #109B6D;
}

.titulo h1{
    font-size: 2.5rem;
}

.pesquisa{
    width: 100%;
}

.campo_pesquisa{
    width: 100%;
    display: flex;
    position: relative;
    align-items: center;
    box-sizing: border-box;
    margin-bottom: 5rem;
}

.campo{
    background-color: #EBEBEB75;
    border: 0;
    border: solid 2px #909090;
    width: 60%;
    height: 3.5em;
    border-radius: 15px;
    padding: 0px 0px 0px 15px;
    margin-right: 2%;
    transition: .8s;
}

.campo:focus{
    transition: .8s;
    box-shadow: 0px 0px 0px 6px #496ddb75;
    border-color: #909090;
    font-size: .8rem;
    color: #0B2060;
    outline-color: rgba(0, 0, 255, 0);
    outline-width: 0px;
}

.campo::placeholder{
    font-size: 1rem;
    font-weight: 550;
}

.botao_pesquisa{
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
    padding: .8em;
    border: 0;
    background-color: #0B2060;
    box-sizing: border-box;
    margin-right: 15%;
}

.botao_pesquisa:hover{
    background-image: linear-gradient(-180deg, #0B2060, #143dba);
}

button:hover{
    cursor: pointer;
}

.botao_pesquisa img{
    width: 100%;
}


.adicionar{
    display: flex;
    align-items: center;
    background-color: #109B6D;
    border: 0;
    height: 3rem;
    padding: 10px 15px 10px 15px;
    border-radius: 15px;
}


.adicionar img{
    border: solid 2px white;
    padding: 4px;
    border-radius: 100%;
    margin-right: 5px;
}

.adicionar:hover img{
    transition: 2s;
    transform: rotate(180deg);
}

.adicionar p{
    color: white;
    font-size: 1.1rem;
    font-weight: 500;
}

/*Pesquisa*/



/*Conteudo*/

.conteudo{
    width: 100%;
    overflow-x: hidden;
}

.conteudo h2{
    margin-bottom: .5em;
    margin-left: 2em;
    font-size: 1.5rem;
    font-weight: 500;
}

/* Conteudo */






/* Modal adicionarOferta */

.modal_adiconar{
    width: 60%;
    height: 75%;
    background-color: white;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}

.modal_adiconar .modal_header{
    height: 15%;
    margin: 0;
}

.modal_adiconar .oferta_detalhes{
    padding-top: 2%;
    height: fit-content;
}

.modal_adiconar .oferta_detalhes .pessoais #input_img{
    display: none;
}

.modal_adiconar .oferta_detalhes .pessoais label{
    background-color: #90909060;
    border-radius: 10px;
    margin-right: 2%;
    padding: 10px;
}

label:hover{
    cursor: pointer;
}

.modal_adiconar .oferta_detalhes .pessoais label img{
    width: 3em; 
}

.modal_adiconar .oferta{
    display: flex;
    flex-wrap: wrap;
}


.modal_adiconar .oferta_detalhes div{
    margin-bottom: 3%;
}

.modal_adiconar .oferta label{
    margin-bottom: 1%;
    display: block;
}

.modal_adiconar .oferta input{
    margin-bottom: 2%;
    display: block;
    font-size: 1rem;
    padding: 5px;
    border: 2px solid #90909075;
    border-radius: 10px;
}

.div_servico{
    margin-right: 5%;
}

.div_horario{
    margin-right: 5%;
}

.div_valor{
    margin-right: 5%;
}

.espaco_descricao{
    width: 100%;
    box-sizing: border-box;
}

.descricao{
    width: 100%;
    height: 55px;
    font-family: 'Roboto',sans-serif;
    border-radius: 10px;
    font-size: 1rem;
    padding-top: 5px;
    padding-left: 5px;
}

.modal_adiconar .modal_footer{
    height: 15%;
    border-radius: 0px 0px 10px 10px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
.modal_adiconar .fechar{
    margin-bottom: 0;
}

.modal_adiconar .modal_footer .ofertar{
    background-color: #143dba;
    color: white;
}

/* Modal adicionarOferta */




/* Modal verOferta */

.modal_fundo{
    width: 100vw;
    height: 100vh;
    background-color: #00000075;
    z-index: 3;
    position: fixed;
}


.modal_verOferta{
    width: 60%;
    height: 75%;
    background-color: white;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: fixed;
    z-index: 1;
    left: 20%;
    right: 25%;
}

.modal_header{
    background-color: #143dba;
    color: white;
    height: 15%;
    border-radius: 10px 10px 0px 0px;
    margin-bottom: 2%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.oferta_detalhes{
    height: 70%;
    padding: 0% 3% 0% 3%;
}

.pessoais{
    display: flex;
    align-items: center;
    margin-bottom: 4%;
    color: #0B2060;
}

.img{
    width: 75px;
    height: 75px;
    border-radius: 100%;

    display: flex;
    justify-content: center;
    align-items: center;
    border: 3px solid #EBEBEB;

}

.pessoais .img img{
    width: 75%;
    height: 75%;
}

.pessoais h3{
    margin-right: 3%;
}

.oferta p{
    color: #404040;
    margin-bottom: 2%;
}

.modal_footer{
    height: 15%;
    border-radius: 0px 0px 10px 10px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.modal_footer button{
    background-color: #404040;
    color: white;
    padding: 10px 15px;
    font-size: 1rem;
    border: 0;
    font-weight: 550;
    margin-right: 3%;
    border-radius: 5px;
}

.modal_footer a{
    background-color: #143dba;
    color: white;
    padding: 10px 15px;
    margin-right: 2%;
    font-weight: 550;
    border-radius: 5px;
}

/* Modal verOferta */



.none{
    display: none;
}