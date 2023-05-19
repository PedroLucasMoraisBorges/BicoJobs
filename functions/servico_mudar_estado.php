<?php
require_once("../conection/conection.php");


$contato = $_POST['contato'];
$id = $_POST['id'];

echo "<script>open('https://api.whatsapp.com/send?phone=$contato', '_blank');</script>";


header("Location: http://localhost/BicoJobs/templates/servicos.php");
