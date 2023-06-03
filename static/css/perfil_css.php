<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

*{
    margin: 0;
    padding: 0;
}

body{
    font-size: 18px;
    font-family: 'Roboto',sans-serif;
    color: #0B2060;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}


main{
    width: 100%;
    padding: 3% 2% 2% 2%;
    box-sizing: border-box;
    height: fit-content;
}

form{
    width: 100%;
    padding: 3% 2% 2% 2%;
    box-sizing: border-box;
    height: fit-content;
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


.meio p{
    color: #303030;
}
.meio{
    display: flex;
}

.left{
    padding: 0px 3rem 0rem 1rem;
}

.left img{
    width: 200px;
    height: 200px;
    margin-bottom: 1.5rem;
}

.habilidades h3{
    text-align: center;
    margin-bottom: .75rem;
}

.left .habilidades p{
    background-color: #1237A630;
    padding: 7.5px;
    margin-bottom: 10px;
    width: fit-content;
    border-radius: 5px;
}

.right{
    display: flex;
    flex-direction: column;
    width: 65%;
    padding: 0px 0rem 0rem 3rem;
    border-left: 1px solid black;
}

.right h3{
    margin-bottom: .8rem;
}

.nome{
    margin-bottom: 3rem;
}

.info_pessoais{
    display: grid;
    grid-template-columns: 55% 35%;
    margin-bottom: 2rem;
}

.info_pessoais div{
    margin-right: 7.5%;
}

.info_pessoais .linguas div{
    display: flex;
}

.info_pessoais .linguas p{
    margin-right: 15%;
}

.contatos{
    display: grid;
    grid-template-columns: 55% 35%;
    margin-bottom: 2rem;
}

.contatos div{
    margin-right: 7.5%;
}

.descricao{
    margin-bottom: 2rem;
}

.descricao p{
    width: 100%;
}

.edit{
    width: 10%;
    background-color: #1237A6;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    color: white;
    border-radius: 10px;
    align-self: end;
}

label:hover{
    cursor: pointer;
}
label img{
    transition: .3s;
}

label img:hover{
    transition: .3s;
    filter: brightness(40%);
}

input{
    display: block;
    font-size: 1rem;
    padding: 5px;
    border: 2px solid #90909075;
    border-radius: 10px;
}

textarea{
    display: block;
    font-size: 1rem;
    padding: 5px;
    border: 2px solid #90909075;
    border-radius: 10px;
    resize: none;
    height: 50%;
    width: 100%;
}

.buttons{
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

button{
    border: 0;
    width: 15%;
    background-color: #1237A6;
    padding: 10px 20px;
    color: white;
    border-radius: 10px;
    align-self: end;
    font-size: 1.1rem;
    margin-left: .5rem;
    transition: .2s;
}

button:hover{
    cursor: pointer;
    filter: brightness(1.15);
}

.buttons a{
    line-height: inherit;
    border: 1px solid #303030;
    border-radius: 10px;
    padding: 10px 20px;
}

.descricao_edit{
    height: 40%;
}

.nome-cep{
    display: grid;
    grid-template-columns: 55% 35%;
    margin-bottom: 2rem;
}

.nome-cep div{
    margin-right: 7.5%;
}


/* error */
.erro{
    color: red;
    border: solid 2px red;
}

.erro::placeholder{
    color: red;
}

.error-msg{
    position: absolute;
    z-index: 20;
    top: 10%;
    transform: translateX(-100%);
    left: 0;
    background-color: red;
    color: white;
    padding: 10px;
    transition: 1s;
}

.error-camp{
    border: solid 2px red !important; 
    color: red;
}

.error-camp::placeholder{
    color: red !important;
}

.slide{
    transform: translateX(0);
}

/* error */