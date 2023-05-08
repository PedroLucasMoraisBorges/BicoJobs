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




*{
    margin: 0;
    padding: 0;
}

header li:hover{
    color: white;
}

body{
    font-family: "Roboto", Arial, Helvetica, sans-serif;
    font-size: 18px;
    padding: 0;
}

#pageContainer{
    min-height: 100vh;
    position: relative;
}



main{
    padding:  5rem 5rem;
    padding-bottom: 2rem;
    display: flex;
    justify-content: space-between;
}

footer{
    color: white;
}

.img-centralizer{
    width: 44%;
    margin-bottom: 5rem;
}

.img-centralizer > img{
    margin: auto;
    display: block;
    width: 50%;
}

.info{
    width: 47%;
}

.local{
    color: #11866F;
}

h1{
    margin-bottom: 3.375rem;
    font-weight: 500;
    font-size: 2.5rem;
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