<?php

require_once("../autoload.php");
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Model\Verificacoes;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



$cep = $_POST['cep'];
$url =  "https://viacep.com.br/ws/$cep/json/";
$address = json_decode(file_get_contents($url),true);


$usuario = new User(
    0,
    $_POST['user_cad'],
    $_POST['dtNasci'],
    $_POST['cpf'],
    $address['localidade'],
    $_POST['password_cad'],
    0,
    $_POST['email_cad'],
);

$verificacoes = new Verificacoes;


// VERIFICAÇÕES
$v_email = $verificacoes->verificaEmailCad($pdo, $_POST['email_cad']);
$v_cpf = $verificacoes->verificaCpf($pdo, $_POST['cpf']);

if($v_email != 0){
    $verificacoes->error("Email já existente");
}
else if($v_cpf != 0){
    $verificacoes->error("CPF já cadastrado");
}
else{
    $usuario->sign_in($pdo);
}