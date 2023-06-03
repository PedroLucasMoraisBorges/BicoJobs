<?php

require_once "../autoload.php";
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();


$id_idioma = $_SESSION['id_idioma'];
$id_contato = $_SESSION['id_contato'];
$id_cep = $_SESSION['id_cidade'];


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