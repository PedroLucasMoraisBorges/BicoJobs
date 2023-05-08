<?php
include("../conection/conection.php");
require_once ('../templates/log-cad.php');

//Cria as variáveis, puxando do form no template
$nome = $_POST['user_cad'];
$cpf = $_POST['cpf'];
$dt_nasci = $_POST['dtNasci'];
$pass = $_POST['password_cad'];
$pass1 = $_POST['password2'];
$cep = $_POST['cep'];


// Verifica se tem a cidade no banco
// Verifica na tabela cidade, no atributo nome, se existe um igual ao $cep
$sql_code = "SELECT id FROM cidade WHERE cep = $cep ORDER BY id DESC limit 1";

$sql_code = "SELECT id FROM cidade WHERE cep = $cep ORDER BY id DESC limit 1";



// Verifica se é possível efetuar o código ou da erro
$sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

$quantidade = $sql_query->num_rows;

if($quantidade == 0){
    $sql = "INSERT INTO cidade (id, cep) VALUES ($cep)";
    (mysqli_query($mysqli, $sql));
}
else{
    echo "Já existe";
}

echo "tese";

/*
//Cria uma variável com INSERT INTO nome_tabela(campo,campo) para selecionar os campos de destino, e VALUES com os valores que irão para estes campos;
$sql = "INSERT INTO usuario (nome, cpf, dt_nascimento, senha,id_cidade,tipo_usuario) VALUES ($nome, $cpf, $dt_nasci, $pass, $cep,0)";


if (mysqli_query($mysqli, $sql)) {
    echo "New record created successfully";
    header("Location: painel.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
*/