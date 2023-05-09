<?php
// Iniciar a  sessao
if(!isset($_SESSION)) {
    session_start();
}

//se nn tiver id de sessao, é impedido de acessar o painel
if(!isset($_SESSION['id'])) {
    die("VC NAO PODE ACESSAR ESTA PAGINA PQ NAO ESTÁ LOGADO.<p>
    <a href=\"index.php\">ENTRAR</a>
    </p>");
}

?>