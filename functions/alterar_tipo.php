<?php
session_start();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\User;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// CODIFICAÇÃO DA IMAGEM E ARMAZENAMENTO NA PASTA;

if(isset($_FILES['img_perfil'])){
    $arquivo = strtolower(substr($_FILES['img_perfil']['name'], -4));
    $novo_nome = md5(time()) . $arquivo;
    $diretorio = "../media/img_perfis/";
    move_uploaded_file($_FILES['img_perfil']['tmp_name'] , $diretorio.$novo_nome);
}

// CODIFICAÇÃO DA IMAGEM E ARMAZENAMENTO NA PASTA;



// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 

$usuario = new User(
    $pdo,
    $_SESSION["nome"],
    $_SESSION["dt_nascimento"],
    $_SESSION["cpf"],
    $_SESSION["id_cidade"],
    $_SESSION['senha'],
    $_SESSION['tipo_usuario'],
    $_SESSION['id_contato'],
    1
);

$usuario->alterar_tipo(
    $_SESSION['id'],
    $pdo,
    $novo_nome,
    $_POST['descricao'],
    $_POST['habilidade'],
    $_POST['idioma'],
    $_POST['telefone'],
    $_POST['nome_comp']
);

// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO; 