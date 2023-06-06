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
    color: #1d5be1;
}

body{
    font-size: 18px;
    font-family: 'Roboto',sans-serif;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}


nav{
    display: flex;
}

a{
    position: relative;
    transition: 0.2s;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    line-height: 40px;
}

nav a:hover{
    transition: 0.2s;
    color: #1d5be1;
    height: 40px;
}

nav a:before{
    transition: 0.5s;
    content: "";
    display: block;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    background-color: blue;
    height: 4px;
    bottom: 0;
    width: 0px;
}

nav a:hover::before{
    width: 100%;
}

.meus_bicos{
    position: relative;
}

.meus_bicos div{
    font-size: .8rem;
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 0;
    right: 0;
    width: 1.2rem;
    height: 1.2rem;
    background-color: #11866F;
    color: white;
    font-weight: 400;
}

header{
    display: flex;
    font-weight: bolder;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    color: #03045e;
    padding: 0px 50px 0px 50px;
    position: relative;
    box-sizing: border-box;
    height: 90px;
    box-shadow: 0px 4px 4px #EEEEEE;
    width: 100%;
}


.logo{
    width: 70px;
    height: 70px;
    background-color: #0B2060;
    padding: 0px;
    border: none;
    border-radius: 10px;
    box-sizing: border-box;
    padding: 3px;
}


header h1{
    margin-right: auto;
    margin-left: 1rem;
}


nav a{
    color: #03045e;
    font-weight: bold;
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
    height: 100%;
    margin-left: 5rem;
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
    height: 50px;
    width: 50px;
    border-radius: 100%;

    display: flex;
    align-items: center;
    justify-content: center;
}

.perfil div{
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 100%;
    position: relative;
    display: block;
}

.perfil img{
    border-radius: 50%;
    height: 100%;
    width: 100%;
}

.cor_nav{
    color: #1d5be1;
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
    margin: 0;
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
    color: black;
}

.opçoes a{
    line-height: 22px;
}

footer{
    justify-self: flex-end;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #11151c;
    color: white;
    padding: 5px 20px 5px 20px;
    width: 100%;
    height: 90px;
    box-sizing: border-box;
    color: white;
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


.none{
    opacity: 0;
}