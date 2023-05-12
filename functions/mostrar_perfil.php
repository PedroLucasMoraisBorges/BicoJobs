<?php
session_start();
require_once("../conection/conection.php");

$id = $_SESSION['id'];

$id_idioma = $_SESSION['id_idioma'];
$id_contato = $_SESSION['id_contato'];

$sql_code = "SELECT idioma FROM idioma WHERE id = $id_idioma";
$sql_query = $mysqli->query($sql_code);

$idioma = $sql_query->fetch_assoc();

$sql_code = "SELECT email,telefone FROM contato WHERE id = $id_contato";
$sql_query = $mysqli->query($sql_code);

$contatos = $sql_query->fetch_assoc();


session_start();

$_SESSION['idioma'] = $idioma['idioma'];
$_SESSION['email'] = $contatos['email'];
$_SESSION['telefone'] = $contatos['telefone'];

header("Location: http://localhost/BicoJobs/templates/perfil.php");