<?php
// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../templates/editar_perfil.php");
require_once("../autoload.php");
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Model\Verificacoes;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();




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


$id = $_SESSION['id'];
$descricao = $_POST['descricao'];
$habilidade = $_POST['habilidade'];
$idioma = $_POST['idioma'];
$telefone = $_POST['telefone'];
$nome_comp = $_POST['nome_comp'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cep = $_POST['cep'];



$verificacao = new Verificacoes();


// VERIFICAÇÕES
/*<=====================================================================================>*/


// CEP
if($cep == "00000000" || strlen($cep) != 8){
    $verificacao->error("CEP Inválido");
}


/*<=====================================================================================>*/


// EMAIL;
else if(str_contains($email, "@") === false || str_contains($email, ".") === false){
    $verificacao->error("Email Inválido");
}
else if($verificacao -> verificaEmail($pdo, $email, $_SESSION['id_contato']) != 0){
    $verificacao->error("Email já cadastrado");
}


/*<=====================================================================================>*/


// TELEFONE;
else if(strlen($telefone) < 11){
    $verificacao->error("Telefone Inválido");
}
else if($verificacao -> verificaTel($pdo, $telefone, $_SESSION['id_contato']) != 0){
    $verificacao->error("Telefone já cadastrado");
}


/*<=====================================================================================>*/


else{
    $usuario = new User(
        $id,
        $_SESSION["nome"],
        $_SESSION["dt_nascimento"],
        $_SESSION["cpf"],
        $cep,
        $_SESSION['senha'],
        $_SESSION['tipo_usuario'],
        $_POST['email'],
        1
    );

    $usuario->editar_perfil($pdo, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep);
}