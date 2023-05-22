<?php
//namespace Mercado\Classes;
//require "autoload.php";

// infos do BD
// deve colocar igual como está, letra minúscula ou maiúscula alteram o resultado.
$user = 'root';
$senha = '';
$host = 'localhost';
$database = 'bicojobs';

try {
    $mysqli = new PDO('mysql:host=localhost;dbname=bicojobs', $user, $senha);
    $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>