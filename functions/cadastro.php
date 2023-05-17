<?php
include("../conection/conection.php");
require_once ("../class/user.php");

$caminho = 'http://localhost/BicoJobs';


//Cria as variáveis, puxando do form no template
//$nome = $_POST['user_cad'];
//$dt_nasci = $_POST['dtNasci'];
//$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
//$email = $_POST['email_cad'];
$sql_codes = [];



$url =  "https://viacep.com.br/ws/$cep/json/";
$address = json_decode(file_get_contents($url),true);



$usuario = new User(
    $mysqli,
    $_POST['user_cad'],
    $_POST['dtNasci'],
    $_POST['cpf'],
    $address['localidade'],
    $_POST['password_cad'],
    0,
    $_POST['email_cad'],
    0
);


$teste = $usuario->setIdCidade($sql_codes, $mysqli);
$sql_codes = $teste;

$teste = $usuario->setIdEmail($sql_codes, $mysqli);
$sql_codes = $teste;

$usuario->sign_in($sql_codes,$mysqli);