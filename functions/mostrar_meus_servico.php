<?php
require_once("../templates/seus_bicos.php");

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../autoload.php");
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// VERIFICANDO SE HOUVE PESQUISA

$id = $_SESSION['id'];
if(isset($_GET['submit'])){
    
    $search = $_GET['search'];
    $id_cidade = $_SESSION['id_cidade'];

    // SE A PESQUISA CORRESPONDER TANTO AO NOME QUANTO A CATEGORIA DO SERVICO, MOSTRARÁ AMBOS RESULTADOS;
    $sql = "SELECT * FROM categoria WHERE categoria = '$search'";
    $sql_query = $pdo->query($sql);

    if($sql_query->rowCount() > 0){
        $id_categoria = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];
        $sql = "SELECT * FROM servico WHERE id_usuario = $id AND nome = '$search' OR id_categoria = '$id_categoria'";

        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }
    else{
        $sql = "SELECT * FROM servico WHERE id_usuario = $id AND nome = '$search'";

        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }
    
}

// SE CASO NÃO SEJA EFETUADA A PESQUISA LISTA TODOS OS SERVIÇOS;

else{           
    $id_cidade = $_SESSION['id_cidade'];
    $sql = "SELECT * FROM servico WHERE id_usuario = $id";
    $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Você não tem nenhum serviço no momento</p>
            </div>';

}