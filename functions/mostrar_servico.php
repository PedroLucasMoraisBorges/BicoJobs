<?php
require_once("../conection/conection.php");
require_once("../class/servico.php");
require_once("../templates/servicos.php");

$nome_cliente = $_SESSION['nome'];
$cidade = $_SESSION['cidade'];

if(isset($_POST['submit'])){
    
    $search = $_POST['search'];
    $id_cidade = $_SESSION['id_cidade'];

    $sql = "SELECT * FROM categoria WHERE categoria = '$search'";
    $sql_query = $mysqli->query($sql);

    if($sql_query->num_rows > 0){
        $id_categoria = ($sql_query->fetch_assoc())['id'];
        $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND nome = '$search'  OR id_categoria = '$id_categoria' AND estado = 0";
        $sql_query = $mysqli->query($sql);
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
        
    }

    else{
        $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND nome = '$search' AND estado = 0";
        $sql_query = $mysqli->query($sql);
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }
      
}
else{           
    $id_cidade = $_SESSION['id_cidade'];
    $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0";
    $sql_query = $mysqli->query($sql);
    $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não há serviços locais na sua região, tente verificar se o seu CEP está correto</p>
            </div>';

}

if($sql_query->num_rows > 0){
    while($row = $sql_query->fetch_assoc()){

        $servico = new servico(
            $row['nome'],
            $row['valor'],
            $row['descricao'],
            $row['estado'],
            $row['horario'],
            $row['img_servico'],
            $row['contato'],
            $row['id_categoria']
        );


        $servico->mostrarServicos(
            $mysqli, 
            $row['id'], 
            $row['id_usuario'], 
            $_SESSION['nome'], 
            $_SESSION['cidade']
        );
    }
}
else{
    echo $n_encontrado;
}