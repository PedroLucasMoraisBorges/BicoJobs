<?php
require_once("../templates/servicos.php");

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\Servico;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// DANDO VALOR ÀS VARIÁVEIS PARA O USO

$id = $_SESSION['id'];
$nome_cliente = $_SESSION['nome'];
$cidade = $_SESSION['cidade'];

// DANDO VALOR ÀS VARIÁVEIS PARA O USO



// VERIFICANDO SE HOUVE PESQUISA

if(isset($_GET['submit'])){
    
    $search = $_GET['search'];
    $id_cidade = $_SESSION['id_cidade'];

    // SE A PESQUISA CORRESPONDER TANTO AO NOME QUANTO A CATEGORIA DO SERVICO, MOSTRARÁ AMBOS RESULTADOS;
    $sql = "SELECT * FROM categoria WHERE categoria = '$search'";
    $sql_query = $pdo->query($sql);

    if($sql_query->rowCount() > 0){
        $id_categoria = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];

        // PAGINAÇÃO

        // CAPTURA DE PARÂMETROS DA URL
        $capture = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

        // VARIÁVEIS DE TRATAMENTO
        // PG = número da página, limit = limite de elementos por página, start é o número do elemento que inicia a página
        $pg = ($capture == "" ? 1 : $capture);
        $limit = 5;
        $start = ($pg * $limit) - $limit;

        $id_cidade = $_SESSION['id_cidade'];

        $sql = "SELECT * FROM servico WHERE id_cidade = $id_cidade AND estado = 0 AND nome = '$search' OR id_categoria = $id_categoria AND id_usuario != $id AND serv_status = :status LIMIT $start, $limit";
        $sql_query = $pdo -> prepare($sql);
        $sql_query -> bindValue(":status", 1);
        $sql_query -> execute();

        $sql = "SELECT * FROM servico WHERE id_cidade = $id_cidade AND estado = 0 AND nome = '$search' OR id_categoria = $id_categoria AND id_usuario != $id";
        $sql_rows = $pdo->query($sql);

        // LINES É A QUANTIDADE DE ELEMENTOS SELECIONAOS E QUANTIA É A QUANTIDADE DE PÁGINAS
        $lines = $sql_rows->rowCount();
        $quantia = ceil($lines/$limit);

        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }

    else{
    
        // PAGINAÇÃO

        // CAPTURA DE PARÂMETROS DA URL
        $capture = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

        // VARIÁVEIS DE TRATAMENTO
        // PG = número da página, limit = limite de elementos por página, start é o número do elemento que inicia a página
        $pg = ($capture == "" ? 1 : $capture);
        $limit = 5;
        $start = ($pg * $limit) - $limit;

        $id_cidade = $_SESSION['id_cidade'];

        $sql = "SELECT * FROM servico WHERE id_cidade = $id_cidade AND estado = 0 AND nome = '$search' AND id_usuario != $id AND serv_status = :status LIMIT $start, $limit";
        
        $sql_query = $pdo -> prepare($sql);
        $sql_query -> bindValue(":status", 1);
        $sql_query -> execute();

        $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0 AND nome = '$search' AND id_usuario != $id";
        $sql_rows = $pdo->query($sql);
        
        // LINES É A QUANTIDADE DE ELEMENTOS SELECIONAOS E QUANTIA É A QUANTIDADE DE PÁGINAS
        $lines = $sql_rows->rowCount();
        $quantia = ceil($lines/$limit);
        
        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }
    
}

// SE CASO NÃO SEJA EFETUADA A PESQUISA LISTA TODOS OS SERVIÇOS;
else{           

    // PAGINAÇÃO

    // CAPTURA DE PARÂMETROS DA URL
    $capture = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

    // VARIÁVEIS DE TRATAMENTO
    // PG = número da página, limit = limite de elementos por página, start é o número do elemento que inicia a página
    $pg = ($capture == "" ? 1 : $capture);
    $limit = 5;
    $start = ($pg * $limit) - $limit;

    $id_cidade = $_SESSION['id_cidade'];

    $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0 AND id_usuario != $id AND serv_status = :status LIMIT $start, $limit";
    $sql_query = $pdo -> prepare($sql);
    $sql_query -> bindValue(":status", 1);
    $sql_query -> execute();

    $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0 AND id_usuario != $id";
    $sql_rows = $pdo->query($sql);

    // LINES É A QUANTIDADE DE ELEMENTOS SELECIONAOS E QUANTIA É A QUANTIDADE DE PÁGINAS
    $lines = $sql_rows->rowCount();
    $quantia = ceil($lines/$limit);



    // CASO NÃO SEJA ENCONTRADO NENHUM SERVIÇO COM O MESMO ID_USARIO MOSTRARÁ O ERRO;
    $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não há serviços locais na sua região, tente verificar se o seu CEP está correto</p>
            </div>';

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