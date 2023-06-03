<?php
// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once ("../templates/logcad.php");
require_once "../autoload.php";
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Model\Verificacoes;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();



$email = $_POST['user_log'];
$senha = $_POST['password_log'];


$verificacao = new Verificacoes;
$v_email = $verificacao -> verificaEmailLog($pdo, $email);
$v_email_senha = $verificacao -> verificaEmailSenha($pdo, $v_email, $senha);

if($v_email == "null"){
    $verificacao->error("Email não encontrado");
}
else if($v_email_senha == "null"){
    $verificacao->error("Senha não corresponde");
}
else{
    $usuario = new User(0, "", "", 0, 0, $senha, 0, $email);
    $usuario->login($pdo,$v_email_senha);
}
