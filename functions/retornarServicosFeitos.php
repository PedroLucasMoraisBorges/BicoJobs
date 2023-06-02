<?php

require_once("../autoload.php");
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Model\Grafico;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

$user = new User(
    $_SESSION['id'],
    $_SESSION['nome'],
    $_SESSION['dt_nascimento'],
    $_SESSION['cpf'],
    $_SESSION['cidade'],
    $_SESSION['senha'],
    $_SESSION['tipo_usuario'],
    $_SESSION['email']
);

$grafico = new Grafico($pdo);