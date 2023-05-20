<?php
require_once("../conection/conection.php");
require_once("../templates/seus_bicos.php");
require_once("../class/servico.php");

$id = $_SESSION['id'];

// Ativos
if(isset($_GET['submit'])){
    
    $search = $_GET['search'];
    $id_cidade = $_SESSION['id_cidade'];

    $sql = "SELECT * FROM categoria WHERE categoria = '$search'";
    $sql_query = $mysqli->query($sql);

    if($sql_query->rowCount() > 0){
        $id_categoria = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];
        $sql = "SELECT * FROM servico WHERE id_usuario = $id AND nome = '$search' OR id_categoria = '$id_categoria'";
        //$sql_query = $mysqli->query($sql);
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }

    else{
        $sql = "SELECT * FROM servico WHERE id_usuario = $id AND nome = '$search'";
        //$sql_query = $mysqli->query($sql);
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }
    
}
else{           
    $id_cidade = $_SESSION['id_cidade'];
    $sql = "SELECT * FROM servico WHERE id_usuario = $id";
    //$sql_query = $mysqli->query($sql);
    $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Você não tem nenhum serviço no momento</p>
            </div>';

}