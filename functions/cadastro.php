<?php
// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../autoload.php");
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



$cep = $_POST['cep'];
$sql_codes = [];


$url =  "https://viacep.com.br/ws/$cep/json/";
$address = json_decode(file_get_contents($url),true);



// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 

$usuario = new User(
    $_POST['user_cad'],
    $_POST['dtNasci'],
    $_POST['cpf'],
    $address['localidade'],
    $_POST['password_cad'],
    0,
    $_POST['email_cad'],
);


// VERIFICA SE HÁ CIDADE CADASTRADA (SE TIVER PEGA O ID DA CIDADE SE NÃO TIVER CRIA UMA NOVA); 
$teste = $usuario->setIdCidade($sql_codes, $pdo);
$sql_codes = $teste;


// VERIFICA SE HÁ EMAIL CADASTRADO, SE TIVER BLOQUEIA O CADASTRO;
$teste = $usuario->setIdEmail($sql_codes, $pdo);
$sql_codes = $teste;


// EFETUTA O CADASTRO;
$usuario->sign_in($sql_codes,$pdo);

// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO AS FUNÇÕES; 