<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

div{
    display: inherit;
}

*{
    margin: 0;
    padding: 0;

}

.currentPage{
    color: white;
}

body{
    font-size: 18px;
    font-family: 'Roboto',sans-serif;
}


a{
    transition: 0.2s;
    cursor: pointer;
    text-decoration: none;
}

nav a:hover{
    transition: 0.2s;
    color: white;
}

header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #0B2060;
    color: white;
    padding: 5px 20px 5px 20px;
    position: relative;
    box-sizing: border-box;
}

.logo{
    width: 45px;
}



nav a{
    color: #A8948B;
    font-weight: 500;
    margin: 0px 10px 0px 10px;
    font-size: 1rem;
}

.perfil{
    display: flex;
    align-items: center;
    font-size: 1rem;
    position: relative;
    justify-content: flex-end;
    width: fit-content;
    width: 15%;
}

.perfil:hover{
    cursor: pointer;
}

.perfil p{
    margin-right: 10px;
    text-align: end;
}

.perfil .img{
    background-color: white;
    
    width: 50px;
    height: 50px;
    border-radius: 100%;

    display: flex;
    align-items: center;
    justify-content: center;
}

.perfil div img{
    position: relative;
    display: block;
    height: 35px;
}

.cor_nav{
    color: white;
}
.opçoes{
    position: absolute;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100px;
    height: 70px;
    position: absolute;
    background-color: white;
    box-shadow: 0px 4px 4px #00000080;
    color: black;
    border-radius: 10px 0px 10px 10px;
    top: 100%;
    right: 3%;
}

.op_none{
    display: none;
}

.perfil_Click_Option{
    color: #0B2060;
}

.opçoes div{
    width: 90%;
    margin: 5px 0px 5px 0px;
    height: 2px;
    background-color: #0B206075;
    border-radius: 10px;
}

.opçoes div a{
    color: #0B2060;
}

footer{
    justify-self: flex-end;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #0B2060;
    padding: 5px 20px 5px 20px;
    width: 100%;
    height: 75px;
    box-sizing: border-box;
}

footer .logo{
    position: absolute;
    left: 50%;
    transform: translate(-50%);
}

.copy{
    display: flex;
    align-items: center;
    font-size: .9rem;
    width: fit-content;
    color: white;
}

.copy img{
    margin-right: 10px;
}

.contact{
    display: flex;
    width: fit-content;
}

.contact a{
    display: flex;
    background-color: white;
    width: 50px;
    height: 50px;
    justify-content: center;
    align-items: center;
    margin: 0px 10px 0px 10px;
    border-radius: 100%;
}

.contact a:hover{
    transition: .4s;
    box-shadow: 6px 5px 0px #1d5be1;
}