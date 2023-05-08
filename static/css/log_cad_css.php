<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

*{
    padding: 0;
    margin: 0;
}

body{
    font-family: 'Roboto',sans-serif;
    height: 100vh;
    background-image: linear-gradient(160deg, #0D3283, #10B981);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    margin: 0;
}

.back{
    z-index: -1;
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: url(/media/pattern.svg);
    opacity: 20%;
}

h1{
    font-size: 5rem;
    color: #0F234E;
    margin-bottom: 20px;
    margin-top: 70px;
}

p{
    color: #0F234E;
}

.main{
    background-color: white;
    width: 1100px;
    height: 650px;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
    display: flex;
    box-shadow: 3px 2px 5px rgba(7, 7, 7, 0.332);
}

.log{
    height: 100%;
    width: 50%;
    border-radius: 20px 0px 0px 20px;
    width: 50%;

    display: flex;
    flex-direction: column;
    align-items: center;

    position: relative;
}

.text{
    width: 70%;
    height: 35px;
    border-radius: 15px;
    border: solid 2px #82828280;
    padding: 5px 5px 5px 10px;
    margin-top: 20px;
}

.text::placeholder{
    font-weight: bold;
    color: #ababab;
}

.inline{
    display: flex;
    width: 70%;
    justify-content: space-between;
    margin-top: 10px;
    margin-bottom: 30px;
    color: #0D3283;
    font-weight: 400;
}

.inline a{
    color: #0D3283;
}

.check{
    width: 15px;
    border-radius: 2px;
}

.esq_senha{
    font-size: 1rem;
}

.rad{
    font-weight: 450;
}

.rad:hover{
    cursor: pointer;
}

.check_lembrar{
    align-self: start;
    margin-left: 15%;
    margin-bottom: 75px;
    color: #0D3283;
}

.login button{
    background-color: #10B981;
    border: 0;
    padding: 15px 75px 15px 75px;
    font-size: 1.2rem;
    font-weight: bold;
    color: white;
    border-radius: 40px;
    width: 300px;
    box-shadow: 1px 1px 3px #0d7c57;
}

.login button:hover{
    cursor: pointer;
}


.img{
    transition: 0.3s;
    display: block;
    position: absolute;
    z-index: 5;
    left: 50%;
    background-image: linear-gradient(90deg, #109B6D, #23D398);
    height: 100%;
    width: 50%;
}

.img-log{
    position: absolute;
    transition: 0.3s;
    opacity: 1;
    top: 45%;
    transform: translateY(-50%);
}

.img-cad{
    transition: 0.1s;
    opacity: 0;
}

.img-slided{
    left: 0%;
}

.img-slided .img-log{
    opacity: 0;
}

.img-slided .img-cad{
    opacity: 1;
}

img{
    display: block;
    width: 275px;
    margin: 60px auto 0px auto;
}

.texto{
    margin: 60px auto 0px auto;
    width: 70%;
}


.img p{
    font-size: 1.4rem;
    font-weight: 500;
    color: white;
    text-align: center;
}

strong{
    color: #0F234E;
}

.interacao{
    position: absolute;
    margin-bottom: 20px;
    bottom: 0;
}


.cad{
    height: 100%;
    width: 50%;
    border-radius: 20px 0px 0px 20px;
    width: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;

    position: relative;
}

.cad h1{
    margin-top: 5px;
    margin-bottom: 5px;
}

.cad .inline{
    display: flex;
    width: 70%;
    justify-content: start;
    margin-top: 10px;
    margin-bottom: 0px;
    color: #0D3283;
    font-weight: 400;
}

.cad .rad{
    margin-left: 3px;
}

.cadastro button{
    background-color: #10B981;
    border: 0;
    padding: 15px 75px 15px 75px;
    font-size: 1.2rem;
    font-weight: bold;
    color: white;
    border-radius: 40px;
    width: 300px;
    box-shadow: 1px 1px 3px #0d7c57;
    margin: 20px 0px 10px 0px;
}

.cadastro button:hover{
    cursor: pointer;
}

label{
    font-size: 1rem;
}

h2{
    font-size: 2rem;
    color:white;
}

.cad .text{
    margin-top: 8px;
}

.cad .texto{
    margin: 30px auto 0px auto;
    width: 70%;
}

.cad .img p{
    text-align: start;
}

.hov_log{
    animation: slide-in-left;
    animation-duration: 2s;
    border-radius: 20px 0px 0px 20px;
}

.hov_cad{
    animation: slide-in-right;
    animation-duration: 2s;
    border-radius: 0px 20px 20px 0px;
}

.text_2{
    margin: 30px auto 0px auto;
    width: 70%;
}

.erro{
    color: red;
    border: solid 2px red;
}

.erro::placeholder{
    color: red;
}