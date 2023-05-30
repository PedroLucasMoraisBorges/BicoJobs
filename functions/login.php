<?php
require_once ("../templates/logcad.php");
// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Model\Verificacoes;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// DANDO VALOR ÀS VARIÁVEIS PARA O USO;

$email = $_POST['user_log'];
$senha = $_POST['password_log'];

// DANDO VALOR ÀS VARIÁVEIS PARA O USO;

$verificacao = new Verificacoes;
$v_email = $verificacao -> verificaEmailLog($pdo, $email);
$v_email_senha = $verificacao -> verificaEmailSenha($pdo, $v_email, $senha);


if($v_email != "null" && $v_email_senha != 0){
    $usuario = new User(0, "", "", 0, 0, $senha, 0, $email);
    $usuario->login($pdo,$v_email_senha);
}
// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 


// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 
