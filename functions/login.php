<?php

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// DANDO VALOR ÀS VARIÁVEIS PARA O USO;

$email = $_POST['user_log'];
$senha = $_POST['password_log'];

// DANDO VALOR ÀS VARIÁVEIS PARA O USO;



// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 

$usuario = new User("", "", 0, 0, $senha, 0, $email);
$usuario->login($pdo,$email, $senha);

// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 
