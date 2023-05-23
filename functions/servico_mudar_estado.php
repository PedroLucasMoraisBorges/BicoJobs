<?php

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../autoload.php");
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
use Pi\Bicojobs\Model\Servico;

$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// PUXANDO INFORMAÇÕES DO USUÁRIO E A FORMA DE CONTATO;

$user_id = $_POST['user_id'];
$contatar = $_POST['contatar'];
$id = $_POST['id'];

// PUXANDO INFORMAÇÕES DO USUÁRIO E A FORMA DE CONTATO;


$servico = new Servico(0, "", "", "", 0, "", "", "", "", "");

// VERIFICANDO SE O BOTÃO FOI ACIONADO;

if(isset($_POST['cancelar']) == true){
    $servico -> deletarServicoAvaliacao($pdo, $id);
    $servico -> alterarEstado($user_id, $pdo, 0, $id, $contatar);
}
else if(isset($_POST['confirmar']) == true){
    $servico -> alterarEstado($user_id, $pdo, 2, $id, $contatar);
}
else if(isset($_POST['finalizar']) == true){
    //$servico -> deletarServicoAvaliacao($pdo, $id);
    $servico -> alterarEstado($user_id, $pdo, 0 , $id, $contatar);
}
else if(isset($_POST['deletar']) == true){
    $servico -> deletarServico($pdo, $id, $servico);
}
else{
    // MUDANÇA DE ESTADO DO SERVIÇO;
    $servico -> alterarEstado($user_id, $pdo, 1, $id, $contatar);

}