<?php
session_start();
include("../conection/conection.php");
require_once("../class/user.php");

// verifica se o usuário fez o input da imagem.
if(isset($_FILES['img_perfil'])){
    // Altera o nome do arquivo para não haver diferença entre os formatos de imagem .png etc...
    $arquivo = strtolower(substr($_FILES['img_perfil']['name'], -4));
    // O time retorna o horário do input e o md5 criptografa isso, servindo para não haver nomes d earquivos duplicados
    $novo_nome = md5(time()) . $arquivo;
    $diretorio = "../media/img_perfis/";
    // O php recebe os arquivos e aloca em um diretório temporário e cria um nome temporário, com o tmp_name;
    // O move_uploaded_file pega o arquivo desse diretório temporário, e aloca ele em um novo diretório e com o novo nome;
    move_uploaded_file($_FILES['img_perfil']['tmp_name'] , $diretorio.$novo_nome);
}

$id = $_SESSION['id'];
$img_perfil = $novo_nome;
$descricao = $_POST['descricao'];
$habilidade = $_POST['habilidade'];
$idioma = $_POST['idioma'];
$telefone = $_POST['telefone'];
$nome_comp = $_POST['nome_comp'];

$usuario = new User(
    $mysqli,
    $_SESSION["nome"],
    $_SESSION["dt_nascimento"],
    $_SESSION["cpf"],
    $_SESSION["id_cidade"],
    $_SESSION['senha'],
    $_SESSION['tipo_usuario'],
    $_SESSION['id_contato'],
    1
);

$sql = "UPDATE usuario SET tipo_usuario= 1 WHERE id = $id";
$sql_query = $mysqli->query($sql);

$usuario->alterar_tipo($id,$mysqli,$img_perfil,$descricao,$habilidade,$idioma,$telefone,$nome_comp);