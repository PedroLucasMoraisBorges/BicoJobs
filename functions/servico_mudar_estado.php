<?php

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../autoload.php");
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// PUXANDO INFORMAÇÕES DO USUÁRIO E A FORMA DE CONTATO;

$user_id = $_POST['user_id'];
$contatar = $_POST['contatar'];
$id = $_POST['id'];

// PUXANDO INFORMAÇÕES DO USUÁRIO E A FORMA DE CONTATO;



// QUANDO O USUÁRIO SOLICITAR UM SERVIÇO, SERÁ INSERIDO NA TABELA SERVICOAVALIAR PARA, ASSIM QUE CONFIRMADO, O CLIENTE PODER DAR SUA AVALIAÇÃO

$sql = "INSERT INTO servicoavaliar (id_usuario, id_servico) VALUES ($user_id, $id)";
$result = $pdo->query($sql);



// VERIFICA SE A FORMA DE CONTATI É EMAIL OU TELEFONE PARA EFETUAR O REDIRECIONAMENTO
if(str_contains($contatar, "@")){
    echo "<script>open('$contatar', '_blank');</script>";
}
else{
    echo "<script>open('$contatar', '_blank');</script>";
}



// MUDANÇA DE ESTADO DO SERVIÇO;

$sql = "UPDATE servico SET estado = 1 WHERE id = $id";
$sql_query = $pdo->query($sql);



// REDIRECIONAMENTO PARA A HOME;
echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";