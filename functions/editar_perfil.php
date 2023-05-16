<?php
include("../conection/conection.php");
require_once ("../class/user.php");
require_once("../templates/editar_perfil.php");


if(isset($_FILES['img_perfil']) && !empty($_FILES["img_perfil"]["name"])){
    // Altera o nome do arquivo para não haver diferença entre os formatos de imagem .png etc...
    $arquivo = strtolower(substr($_FILES['img_perfil']['name'], -4));
    // O time retorna o horário do input e o md5 criptografa isso, servindo para não haver nomes d earquivos duplicados
    $novo_nome = md5(time()) . $arquivo;
    $diretorio = "../media/img_perfis/";
    // O php recebe os arquivos e aloca em um diretório temporário e cria um nome temporário, com o tmp_name;
    // O move_uploaded_file pega o arquivo desse diretório temporário, e aloca ele em um novo diretório e com o novo nome;
    move_uploaded_file($_FILES['img_perfil']['tmp_name'] , $diretorio.$novo_nome);
    $img_perfil = $novo_nome;
}
else{
    $img_perfil = $_SESSION['img_perfil'];
}

   

$id = $_SESSION['id'];
$descricao = $_POST['descricao'];
$habilidade = $_POST['habilidade'];
$idioma = $_POST['idioma'];
$telefone = $_POST['telefone'];
$nome_comp = $_POST['nome_comp'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$sql_codes = [];



if($descricao == "" || $habilidade == "" || $idioma == "" || $telefone == "" || $nome_comp == "" || $nome == "" || $email == ""){
    echo "<script> 
        let error = document.getElementById('error-msg-login');
        error.innerHTML = 'Campos obrigatórios não preenchidos';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
        error.classList.remove('slide');
        }, 3250);
        </script>";
}
else if($cep == "00000000" || strlen($cep) != 8){
    echo "<script> 
        let error = document.getElementById('error-msg-login');
        error.innerHTML = 'CEP Inválido';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
        error.classList.remove('slide');
        }, 3250);
        </script>";
}
else if(str_contains($email, "@") === false || str_contains($email, ".") === false){
    echo "<script> 
        let error = document.getElementById('error-msg-login');
        error.innerHTML = 'Email Inválido';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
        error.classList.remove('slide');
        }, 3250);
        </script>";
}
else if(strlen($telefone) < 11){
    echo "<script> 
        let error = document.getElementById('error-msg-login');
        error.innerHTML = 'Telefone Inválido';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
        error.classList.remove('slide');
        }, 3250);
        </script>";
}
else{
    $usuario = new User(
        $mysqli,
        $_SESSION["nome"],
        $_SESSION["dt_nascimento"],
        $_SESSION["cpf"],
        $cep,
        $_SESSION['senha'],
        $_SESSION['tipo_user'],
        $_POST['email'],
        1
    );
    
    $usuario->editar_perfil($mysqli, $id, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep);
}