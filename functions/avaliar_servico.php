<?php

require_once "../autoload.php";
require_once "../templates/componentes/card_servico_avaliar.php";

use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();


$nota = $_POST['score'];
$data = date("Y-m-d",strtotime('-3 hour'));

$sqlConsult = "SELECT * FROM notas";
$stmt = $pdo->query($sqlConsult);
$last_id = $stmt->rowCount() + 1;

$sqlInsert = "INSERT INTO notas (notas, id_usuario, dt) VALUES (:notas, :id_usuario, :dt)";
$stmt = $pdo->prepare($sqlInsert);
$stmt->bindValue(":notas", $nota, PDO::PARAM_INT);
$stmt->bindValue(":id_usuario", PDO::PARAM_INT);
$stmt->bindValue(":dt", $data, PDO::PARAM_STR);
$stmt->execute();

