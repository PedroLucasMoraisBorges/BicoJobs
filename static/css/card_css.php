<style type="text/css">

.conteudo{
    display: inherit;
}


.geral{
    display: flex;
    flex-wrap: wrap;
    border-radius: 10px;
}

.card{
    overflow: hidden;
    width: 300px;
    height: 300px;
    margin: 20px;
    border-radius: 10px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    color: white;
    transition: 0.1s;
    font-size: 1rem;
    box-shadow: 1.5px 1.5px 2px #40404050;
    background-color: #30303080;
}

.card:hover{
    transform: scale(1.03);
}

.card:hover .botao_abrir{
    transform: scale(1.1);
    transition: .5s;
}

.img_fundo{
    position: absolute;
    height: 100%;
    width: 100%;
}

.botao_abrir{
    transition: .8s;
    display: flex;
    align-items: start;
    padding-top: 10px;
    justify-content: center;
    position: absolute;
    bottom: 0;
    right: 0;   
    color: #143dba;
    height: 200px;
    width: 200px;
    text-align: center;
    background-color: white;
    border-radius: 10px 0px 10px 0px;
    rotate: -45deg;
    position: absolute;
    top: 75%;
    left: 75%;
}


.botao_abrir:hover{
    cursor: pointer;
}

.botao_abrir p{
    font-size: 1.2rem;
    font-weight: bold;
}

.card_detalhes{
    position: relative;
    bottom: 0;
    width: 100%;
    border-radius: 10px;
}

.info_princ{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: start;
    margin-bottom: 10px;
    padding-left: 20px;
}

.info_princ h2{
    align-self: flex-end;
    margin-left: 1em;
}

.fundo_azul{
    position: absolute;
    bottom: 0;
    width: 100%;
}

.info_princ img{
    height: 50px;
    background-color: white;
    padding: 10px;
    border-radius: 10px;
}


.info_sec{
    padding-left: 10px;
    padding-bottom: 10px;
}
