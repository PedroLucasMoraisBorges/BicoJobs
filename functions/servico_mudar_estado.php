<?php
require_once("../conection/conection.php");


$contatar = $_POST['contatar'];
$id = $_POST['id'];


if(str_contains($contatar, "@")){
    echo "<script>open('$contatar', '_blank');</script>";
}
else{
    echo "<script>open('$contatar', '_blank');</script>";
}

$sql = "UPDATE servico SET estado = 1 WHERE id = $id";
$sql_query = $mysqli->query($sql);

echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";