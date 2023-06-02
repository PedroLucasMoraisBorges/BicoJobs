<?php
// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// PUXANDO VALORES DA SESSÃO PARA O USO;

$id_idioma = $_SESSION['id_idioma'];
$id_contato = $_SESSION['id_contato'];
$id_cep = $_SESSION['id_cidade'];

// PUXANDO VALORES DA SESSÃO PARA O USO;



// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO;
$usuario = new User(
    $_SESSION["id"],
    $_SESSION["nome"],
    $_SESSION["dt_nascimento"],
    $_SESSION['id_cidade'],
    $_SESSION["cpf"],
    $_SESSION['senha'],
    $_SESSION['tipo_usuario'],
    $_SESSION['id_contato']
);

$usuario->retornar_info($pdo);

// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO;