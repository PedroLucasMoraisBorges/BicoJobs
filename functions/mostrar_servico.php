<?php
require_once("../conection/conection.php");
require_once("../class/servico.php");
require_once("../templates/servicos.php");

if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $id_cidade = $_SESSION['id_cidade'];


    $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND nome = '$search'";
    $sql_query = $mysqli->query($sql);
    $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
            
}
else{           
    $id_cidade = $_SESSION['id_cidade'];
    $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade'";
    $sql_query = $mysqli->query($sql);
    $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não há serviços locais na sua região, tente verificar se o seu CEP está correto</p>
            </div>';

}