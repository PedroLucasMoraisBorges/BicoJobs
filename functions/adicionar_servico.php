<?php

session_start();

include("../conection/conection.php");
require_once("../class/servico.php");

if(isset($_FILES['img_input'])){


    $extensao = strtolower(substr($_FILES['img_input']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "../media/img_services/";
    move_uploaded_file($_FILES['img_input']['tmp_name'], $diretorio.$novo_nome);

}

$id_usuario = $_SESSION['id'];
$input_img = $novo_nome;
$nome_servico = $_POST['servico'];
$horario = $_POST['horario'];
$area_atuacao = $_POST['area-atuacao'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$contato = $_POST['contato'];
$servico = new servico($nome_servico, $valor, $descricao, 0, $horario, $novo_nome, $contato, $area_atuacao);

$servico->inserirNoDB($mysqli);
$servico->setId_usuario($mysqli, $_SESSION['id']);

$id_user = $_SESSION['id'];

$sql = "SELECT id_cidade FROM usuario WHERE id = '$id_user'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$id_cidade = $row['id_cidade'];

$servico->setId_cidade($mysqli, $id_cidade);