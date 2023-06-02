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





.none{
    display: none;
}

.container{
    margin-bottom: 3rem;
    height: 400px;
    width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
}

.container .your-bics{
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    height: 100%;
    min-width: 100%;
    width: fit-content;
}

.container::-webkit-scrollbar {
    position: relative;
    bottom: 20px;
    height: 10px;
}

.container::-webkit-scrollbar-track {
  /*background-color: grey;*/
  border-radius: 15px;
}

.container::-webkit-scrollbar-thumb {
  background-color: #0B2060; 
  border-radius: 15px;
  /*border: 1px solid red;*/
}

.container::-webkit-scrollbar-thumb:hover {
  background: #000033; 
}


.dashboard{
    padding: 5% 0;
    border-radius: 15px;
}
.graficos{
    display: flex;
}
.grafico{
    color: white;
    text-align: center;
    width: 45%;
    padding: 20px;
    margin: 0 auto 1rem auto;
}

.grafico_nota{
    width: 35%;
    margin: auto;   
}

.notas{
    display: flex;
    align-items: center;
}

.nota_unid .nota{
    display: flex;
    align-items: center;
    width: 5rem;
    margin-bottom: 2rem;
}

.um div{
    background-color: #ff4040;
}
.dois div{
    background-color: #ffbc40;
}
.tres div{
    background-color: #ffff40;
}
.quatro div{
    background-color: #4040ff;
}
.cinco div{
    background-color: #00a000;
}

.nota_unid div div{
    width: 3rem;
    height: 3rem;
    color: #000033;
    font-size: 1.4rem;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    margin-right: 1rem;
}

.nota_unid p{
    line-height: auto;
}