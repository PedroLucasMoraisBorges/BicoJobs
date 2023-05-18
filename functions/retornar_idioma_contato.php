<?php
include("../conection/conection.php");
require_once ("../class/user.php");

$id_idioma = $_SESSION['id_idioma'];
$id_contato = $_SESSION['id_contato'];
$id_cep = $_SESSION['id_cidade'];

$usuario = new User(
    $mysqli,
    $_SESSION["nome"],
    $_SESSION["dt_nascimento"],
    $_SESSION["cpf"],
    $_SESSION["id_cidade"],
    $_SESSION['senha'],
    $_SESSION['tipo_usuario'],
    $_SESSION['id_contato'],
    1
);

$usuario->retornar_info($mysqli,$id_idioma, $id_contato, $id_cep);