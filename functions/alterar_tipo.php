<?php
session_start();
include("../conection/conection.php");
require_once("../class/user.php");


$id = $_SESSION['id'];
$img_perfil = $_POST['img_perfil'];
$descricao = $_POST['descricao'];
$habilidade = $_POST['habilidade'];
$idioma = $_POST['idioma'];
$telefone = $_POST['telefone'];

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

$sql = "UPDATE usuario SET tipo_usuario= 1 WHERE id = '$id'";
$sql_query = $mysqli->query($sql);

$usuario->alterar_tipo($id,$mysqli,$img_perfil,$descricao,$habilidade,$idioma,$telefone);