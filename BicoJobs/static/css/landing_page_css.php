<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,700&display=swap');

*{
    padding: 0;
    margin: 0;
}

header, .func{
    padding: 0 5rem;
}

body{
    font-family: "Roboto", Arial, Helvetica, sans-serif;
    font-size: 18px;
    background-color: white;
    margin: 0;
}

a{
    text-decoration: none;
    color: white;
}

h1{
    font-size: 4rem;
    color: white;
    margin-bottom: 1.5rem;
}

h2{
    font-size: 3rem;
}

.funcionalidades h2{
    margin-bottom: 2rem;
    margin-left: 5rem;
}

h3{
    font-size: 2.5rem;
}

header{
    background-image: linear-gradient(to bottom right, #11866F, #0F234E);
    overflow: hidden;
    padding-top: 3.3rem;
}

.top-bar{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5.188rem;
}

nav{
    font-family: "Inter", Arial, Helvetica, sans-serif;
    display: flex;
    align-items: center;
    list-style: none;
}


nav li{
    margin-left: 3.375rem;
}

.nav-option{
    margin-left: 3.375rem;
    position: relative;
}

.nav-option::before{
    transition: 0.2s;
    content: "";
    display: inline-block;
    position: absolute;
    top: 100%;
    right: 0;
    height: 5px;
    width: 0;
    background-color: white;
}

.nav-option:hover::before{
    width: 100%;
}

.signup-link{
    transition: 0.2s;
    cursor: pointer;
    background-color: #109B6D;
    width: 226px;
    height: 44px;
    display: inline-block;
    text-align: center;
    line-height: 44px;
    border-radius: 100px;
    border: solid 3px white;
    font-weight: bolder;
}

.signup-link:hover{
    transform: scale(1.05);
    background-color: white;
    color: #109B6D;
}

.signup-link:active{
    transition: none;
    background-color: #109B6D;
    color: white;
}

.call-to-action{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.call-to-action p{
    font-size: 1.4rem;
    color: white;
    margin-bottom: 2rem;
}

.call-to-action div{
    width: 45%;
}

.call-to-action img{
    width: 40%;
    margin-bottom: 41px;
}

.signin-link{
    background-color: white;
    color: #0079AD;
    width: 240px;
    height: 44px;
    display: inline-block;
    text-align: center;
    line-height: 44px;
    border-radius: 100px;
    border: solid 3px white;
    font-size: 20px;
    font-weight: bolder;
    transition: transform 0.2s, background-color 0.2s, color 0.2s;
}

.signin-link:hover{
    transform: scale(1.05);
    background-color: transparent;
    color: white;
}

.signin-link:active{
    transition: none;
    background-color: white;
    color: #0079AD;
}

.waves{
    position: relative;
    width: 100vw;
    left: -5rem;
    display: block;
    max-width: 100vw;
}

main h2{
    color: #0079AD;
}

.func{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 7rem;
}

.func-middle{
    background-color: #4761AD;
    flex-direction: row-reverse;
    color: white;
    padding: 7rem 5rem;
    margin-bottom: 0;
}

.func-end{
    text-indent: 3rem;
    background-color: #32447A;
    color: white;
    padding: 0;
    padding-left: 5rem;
    flex-direction: row-reverse;
    margin-bottom: 3rem;
}

.func img{
    width: 52%;
}

.func-middle .img{
    position: relative;
    width: 30%;
    background-image: url(../../media/landing_page/background-img3OPacityok.png);
    background-size: cover;
    background-blend-mode: darken;
    background-color: #0026ff54;
    background-position: center;
    padding: 1rem;
    border-radius: 10px;
}


.func-middle  img{
    width: 100%;
}

.func-end img{
    width: 44%;
    height: 650px;
    object-fit: cover;
    object-position: 0;
}

.func-end div{
    width: 55%;
}


.func div{
    width: 40%;
    text-align: justify;
    font-size: 1.4rem;
}

.func h3{
    color:#0079AD;
    margin-bottom: 3rem;
}
.func-middle h3{
    color: white;
}

.func-end h3{
    color: white;
    margin-bottom: 0;
}

.func-end p{
    margin-top: 1rem;
}

.messageReceiveConfirmation{
    transition: 1s;
    display: flex;
    background-color: #109B6D;
    color: white;
    position:fixed;
    top: 5%;
    transform: translateX(-100%);
    padding: 10px 20px;
    opacity: 0.9;
    border-radius: 0px 10px 10px 0;
}

.messageReceiveConfirmation img{
    margin-right: 20px;
}

.slide{
    transition: 0.5s;
    transform: translateX(0);
}


.email-form{
    padding: 5rem;
    padding-bottom: 7rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.error-log{
    position: absolute;margin-top: 5px;
    color: red;
}

@keyframes wrong{
    from{
        transform: translateX(0);
    }
    33%{
        transform: translateX(3%);
    }
    66%{
        transform: translateX(-3%);
    }
    100%{
        transform: translateX(0);
    }
}

.wrong-input{
    border-color: red;
    color: red;
}

.animated{
    animation-name: wrong;
    animation-duration: 0.5s;
}

.wrong-input::placeholder{
    color: red;
}

.email-form div{
    width: 45%;
}

.email-form > img{
    width: 35%;
}

input{
    width: 100%;
    border-width: 0px 0px 1px 0;
    font-size: 1.4rem;
    padding-bottom: 5px;
    margin-top: 3rem;
}

input:focus{
    outline: none;
}

.send-button{
    transition: width 0.2s;
    display: flex;
    align-items: center;
    width: 60%;
    background-color: #32447A;
    color: white;
    font-size: 1.4rem;
    margin: auto;
    display: block;
    margin-top: 3rem;
    height: 55px;
    border-radius: 10px;
    cursor: pointer;
    border: none;
}

.send-button:hover{
    width: 100%;
}

.send-button:active{
    background-color: white;
    color: #0B2060;
}

.send-button:focus{
    width: 100%;
    outline-width: 1px;
    outline-color: white;
    outline-offset: -4px;
}

.post-icon{
    position: relative;
    top: 2px;
    width: 1.5rem;
    margin-right: 1rem;
}

footer{
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #0B2060;
    padding: 5px 20px 5px 20px;
    color: #DDC9C0;
    position: relative;
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
