<?php

require_once "../autoload.php";

use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();


$nota = $_POST['score'];
$id_servico = $_POST['id'];

$sqlConsult = "SELECT id_usuario FROM servico WHERE id = $id_servico";
$stmt = $pdo->query($sqlConsult);


$id_usuario = ($stmt->fetch(PDO::FETCH_ASSOC))['id_usuario'];
$data = date("Y-m-d",strtotime('-3 hour'));

$sqlConsult = "SELECT * FROM notas";
$stmt = $pdo->query($sqlConsult);

$sqlInsert = "INSERT INTO notas (notas, id_usuario, dt) VALUES (:notas, :id_usuario, :dt)";
$stmt = $pdo->prepare($sqlInsert);
$stmt->bindValue(":notas", $nota, PDO::PARAM_INT);
$stmt->bindValue(":id_usuario", $id_usuario, PDO::PARAM_INT);
$stmt->bindValue(":dt", $data, PDO::PARAM_STR);
$stmt->execute();


$sqlDelete = "DELETE FROM servicoavaliar WHERE id_servico = $id_servico";
$pdo->query($sqlDelete);

header("location: http://localhost/BicoJobs/templates/ultimos_bicos.php");

