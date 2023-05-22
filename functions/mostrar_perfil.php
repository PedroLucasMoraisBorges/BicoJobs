<?php
session_start();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../autoload.php");
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// DANDO VALOR ÀS VARIAVEIS PARA O USO;

$id = $_SESSION['id'];
$id_idioma = $_SESSION['id_idioma'];
$id_contato = $_SESSION['id_contato'];

// DANDO VALOR ÀS VARIÁVEIS PARA O USO;



// VARREDURA DA TABELA IDIOMA DE ACORDO COM O ID DO USUARIO;

$sql_code = "SELECT idioma FROM idioma WHERE id = $id_idioma";
$sql_query = $pdo->query($sql_code);
$idioma = $sql_query->fetch(PDO::FETCH_ASSOC);

// VARREDURA DA TABELA IDIOMA DE ACORDO COM O ID DO USUARIO;



// VARREDURA DA TABELA CONTATOS DE ACORDO COM O ID_CONTATO DO USUARIO;

$sql_code = "SELECT email,telefone FROM contato WHERE id = $id_contato";
$sql_query = $pdo->query($sql_code);
$contatos = $sql_query->fetch(PDO::FETCH_ASSOC);

// VARREDURA DA TABELA CONTATOS DE ACORDO COM O ID_CONTATO DO USUARIO;



// INICIO DA SESSÃO ATUALIZANDO OS DADOS;

session_start();

$_SESSION['idioma'] = $idioma['idioma'];
$_SESSION['email'] = $contatos['email'];
$_SESSION['telefone'] = $contatos['telefone'];

header("Location: http://localhost/BicoJobs/templates/perfil.php");

// INICIO DA SESSÃO ATUALIZANDO OS DADOS;
