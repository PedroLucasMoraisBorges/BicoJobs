<?php
require_once("../templates/servicos.php");

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\Servico;
use Pi\Bicojobs\Model\Paginator;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// DANDO VALOR ÀS VARIÁVEIS PARA O USO

$id = $_SESSION['id'];
$id_cidade = $_SESSION['id_cidade'];

// DANDO VALOR ÀS VARIÁVEIS PARA O USO



// VERIFICANDO SE HOUVE PESQUISA

if(isset($_GET['submit'])){
    
    $search = $_GET['search'];

    // SE A PESQUISA CORRESPONDER TANTO AO NOME QUANTO A CATEGORIA DO SERVICO, MOSTRARÁ AMBOS RESULTADOS;
    $sql = "SELECT * FROM categoria WHERE categoria = '$search'";
    $sql_query = $pdo->query($sql);

    if($sql_query->rowCount() > 0){
        $id_categoria = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];

        // PAGINAÇÃO
        $paginator = new Paginator();
        $sql_query = $paginator -> query(
            $pdo, 
            "SELECT * FROM servico WHERE id_cidade = $id_cidade AND estado = 0 AND nome = '$search' OR id_categoria = $id_categoria AND id_usuario != $id"
        );
        $paginator -> queryTotal(
            $pdo,
            "SELECT * FROM servico WHERE id_cidade = $id_cidade AND estado = 0 AND nome = '$search' OR id_categoria = $id_categoria AND id_usuario != $id"
        );
        $pg = $paginator->getPage();
        $quantia = $paginator->getQuantia();

        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado = $paginator->getNull("Não foi encontrado nenhum serviço que atenda a sua pesquisa");
    }

    else{
        // PAGINAÇÃO
        $paginator = new Paginator();
        $sql_query = $paginator -> query(
            $pdo, 
            "SELECT * FROM servico WHERE id_cidade = $id_cidade AND estado = 0 AND nome = '$search' AND id_usuario != $id"
        );
        $paginator -> queryTotal(
            $pdo,
            "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0 AND nome = '$search' AND id_usuario != $id"
        );
        $pg = $paginator->getPage();
        $quantia = $paginator->getQuantia();
        
        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado = $paginator->getNull("Não foi encontrado nenhum serviço que atenda a sua pesquisa");
    }
    
}

// SE CASO NÃO SEJA EFETUADA A PESQUISA LISTA TODOS OS SERVIÇOS;
else{    
    // PAGINAÇÃO
    $paginator = new Paginator();
    $sql_query = $paginator -> query(
        $pdo, 
        "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0 AND id_usuario != $id"
    );
    $paginator -> queryTotal(
        $pdo,
        "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0 AND id_usuario != $id"
    );
    $pg = $paginator->getPage();
    $quantia = $paginator->getQuantia();

    // CASO NÃO SEJA ENCONTRADO NENHUM SERVIÇO COM O MESMO ID_USARIO MOSTRARÁ O ERRO;
    $n_encontrado = $paginator->getNull("Não há serviços locais na sua região, tente verificar se o seu CEP está correto");

}

// VERIFICA SE TEM SERVIÇO NA CIDADE;
if($sql_query->rowCount() > 0){

    // SE TIVER SERVIÇO, O WHILE MOSTRARÁ TODOS;

    while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){

        // INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO;

        $servico = new servico(
            $_SESSION['id_cidade'],
            $row['nome'],
            $row['valor'],
            $row['descricao'],
            $row['estado'],
            $row['horario'],
            $row['img_servico'],
            $row['contato'],
            $row['id_categoria'],
            $row['id_usuario']
        );


        $servico->mostrarServicos(
            $pdo, 
            $row['id'], 
            $row['id_usuario'], 
            $_SESSION['nome'], 
            $_SESSION['cidade'],
            0,
            $_SESSION['id']
        );

        // INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO;
    }
}
// SE NÃO TIVER SERVIÇO NA CIDADE, MOSTRARÁ O ERRO;
else{
    echo $n_encontrado;
}