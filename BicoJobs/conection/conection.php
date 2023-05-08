<?php
// infos do BD
// deve colocar igual como está, letra minúscula ou maiúscula alteram o resultado.
$user = 'root';
$senha = '';
$host = 'localhost';
$database = 'bicojobs';

// DEVE SEGUIR ESSA ORDEM
// Você instacia o banco de dados
// Essa variável vai servir sempre que for acessar o banco, pois deverá ser verificada antes;
$mysqli = new mysqli($host, $user, $senha, $database);

// MSG DE ERRO
if(!$mysqli){
    die('Falha ao concetar com a database:' .$mysqli->error);
}
?>