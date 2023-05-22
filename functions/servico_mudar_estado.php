<?php
require_once("../autoload.php");
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;

$pdo = CriadorConexao::criarConexao();

$user_id = $_POST['user_id'];
$contatar = $_POST['contatar'];
$id = $_POST['id'];

$sql = "INSERT INTO servicoavaliar (id_usuario, id_servico) VALUES ($user_id, $id)";
$result = $pdo->query($sql);

if(str_contains($contatar, "@")){
    echo "<script>open('$contatar', '_blank');</script>";
}
else{
    echo "<script>open('$contatar', '_blank');</script>";
}

$sql = "UPDATE servico SET estado = 1 WHERE id = $id";
$sql_query = $pdo->query($sql);

echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";