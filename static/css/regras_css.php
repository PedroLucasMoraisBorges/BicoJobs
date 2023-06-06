<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

/* states */

.is_closed ul{
    transition: 0.75s;
    height: auto;
    max-height: 0;
    overflow: hidden;
}

.is_closed img{
    transition: 0.25s;
    rotate: 360deg;
}


/*End of states */



nav a{
    font-weight: bold;
    font-size: 16px;
}

*{
    margin: 0;
    padding: 0;
}

header li:hover{
    color: white;
}

main{
    width: 100%;
    padding: 3% 2% 2% 2%;
    box-sizing: border-box;
    height: fit-content;
}

body{
    font-family: "Roboto", Arial, Helvetica, sans-serif;
    font-size: 18px;
    padding: 0;
    background: #F9F9F9;
}

#pageContainer{
    min-height: 100vh;
    position: relative;
}

footer{
    color: white;
}

.img-centralizer{
    height: calc(100vh - 250px);
    position: fixed;
    right: 10rem;
    bottom: 120px;
}

.img-centralizer > img{
    margin: auto;
    display: block;
    width: 100%;
    height: 100%;
}

.info{
    width: 47%;
    display: flex;
    justify-content: space-between;
}

.local{
    color: #11866F;
}

.titulo{
    margin-bottom: 20px;
}
.titulo p{
    color: #109B6D;
}

.titulo h1{
    font-size: 2.5rem;
    color: #4a4e57;
}

.dropdown-activer{
    cursor: pointer;
}

h2{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

h2 img{
    width: 20px;
    transition: 0.25s;
    rotate: 180deg;
}

h2, li{
    margin-bottom: 0.625rem;
}

ul{
    height: auto;
    transition: max-height 1s ease-out;
    overflow: hidden;
    list-style: none;
    max-height: 500px;
    margin-bottom: 2rem;
}

ul li:last-child{
    margin-bottom: 2.125rem;
}

hr{
    margin-bottom: 2.813rem;
}

h2{
    font-size: 1.3rem;
}