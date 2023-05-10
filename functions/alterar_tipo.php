<?php
include("../conection/conection.php");
require_once("../templates/servicos.php");

$id = $_SESSION['id'];

$sql = "UPDATE usuario SET tipo_usuario= 1 WHERE nome = '$id'";
$sql_query = $mysqli->query($sql);

$sql = "SELECT tipo_usuario FROM usuario WHERE nome = '$id'";
$sql_query = $mysqli->query($sql);
$user = $sql_query->fetch_assoc();

if(!isset($_SESSION)){
    session_reset();
}

$_SESSION['tipo_user'] = 1;

header("Location: http://localhost/BicoJobs/templates/seus_bicos.php");