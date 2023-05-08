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
}


main{
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