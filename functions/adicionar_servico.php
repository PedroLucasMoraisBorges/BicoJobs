<?php
session_start();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\Servico;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// CODIFICAÇÃO DA IMAGEM E ARMAZENAMENTO NA PASTA;

if(isset($_FILES['img_input']))
{
    $extensao = strtolower(substr($_FILES['img_input']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "../media/img_services/";
    move_uploaded_file($_FILES['img_input']['tmp_name'], $diretorio.$novo_nome);
}
// CODIFICAÇÃO DA IMAGEM E ARMAZENAMENTO NA PASTA;



// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES INPUTADAS E DO USUARIO;  

$servico = new servico(
    $_SESSION['id_cidade'],
    $_POST['servico'],
    $_POST['valor'],
    $_POST['descricao'],
    0, 
    $_POST['horario'],
    $novo_nome, 
    $_POST['contato'], 
    $_POST['area-atuacao'],
    $_SESSION['id']
);

$servico->inserirNoDB($pdo);

// INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES INPUTADAS E DO USUARIO;  


session_start();

header("Location: http://localhost/BicoJobs/templates/servicos.php");

