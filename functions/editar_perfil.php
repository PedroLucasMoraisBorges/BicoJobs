<?php
require_once("../templates/editar_perfil.php");

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../autoload.php");
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Model\Verificacoes;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// CODIFICAÇÃO DA IMAGEM E ARMAZENAMENTO NA PASTA;

if(isset($_FILES['img_perfil']) && !empty($_FILES["img_perfil"]["name"])){
    $arquivo = strtolower(substr($_FILES['img_perfil']['name'], -4));
    $novo_nome = md5(time()) . $arquivo;
    $diretorio = "../media/img_perfis/";
    move_uploaded_file($_FILES['img_perfil']['tmp_name'] , $diretorio.$novo_nome);
}
else{
    $img_perfil = $_SESSION['img_perfil'];
}

// CODIFICAÇÃO DA IMAGEM E ARMAZENAMENTO NA PASTA;

   

// DANDO VALOR ÀS VARIÁVEIS PARA O USO;

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


// DANDO VALOR ÀS VARIÁVEIS PARA O USO;

$verificacao = new Verificacoes();


if($cep == "00000000" || strlen($cep) != 8){
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

// VERIFICA A VALIDADE DO EMAIL;

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
else if($verificacao -> verificaEmail($pdo, $email, $_SESSION['id_contato']) != 0){
    echo "<script> 
        let error = document.getElementById('error-msg-login');
        error.innerHTML = 'Email já cadastrado';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
        error.classList.remove('slide');
        }, 3250);
        </script>";
}

// VERIFICA A VALIDADE DO TELEFONE;

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
else if($verificacao -> verificaTel($pdo, $telefone, $_SESSION['id_contato']) != 0){
    echo "";
}
else{

    // INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 

    $usuario = new User(
        $_SESSION['id'],
        $_SESSION["nome"],
        $_SESSION["dt_nascimento"],
        $_SESSION["cpf"],
        $cep,
        $_SESSION['senha'],
        $_SESSION['tipo_usuario'],
        $_POST['email'],
        1
    );

    $usuario->editar_perfil($pdo, $id, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep, $usuario);
    // INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO;
}