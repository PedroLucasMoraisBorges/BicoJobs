<?php
include("../conection/conection.php");
require_once ("../class/user.php");
require_once("../templates/servicos.php");

$id_idioma = $_SESSION['id_idioma'];
$id_contato = $_SESSION['id_contato'];

$usuario = new User(
    $mysqli,
    $_SESSION["nome"],
    $_SESSION["dt_nascimento"],
    $_SESSION["cpf"],
    $_SESSION["cep"],
    $_SESSION['senha'],
    $_SESSION['tipo_user'],
    $_SESSION['id_contato'],
    1
);

$usuario->retornar_info($mysqli,$id_idioma, $id_contato);