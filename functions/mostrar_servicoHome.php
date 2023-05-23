<?php
require_once("../templates/servicos.php");

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once "../autoload.php";
use Pi\Bicojobs\Model\Servico;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;



// DANDO VALOR ÀS VARIÁVEIS PARA O USO

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
        $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND nome = '$search'  OR id_categoria = '$id_categoria' AND estado = 0";
        $sql_query = $pdo->query($sql);

        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }

    else{
        $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND nome = '$search' AND estado = 0";
        $sql_query = $pdo->query($sql);
        
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
    $sql = "SELECT * FROM servico WHERE id_cidade = '$id_cidade' AND estado = 0";
    $sql_query = $pdo->query($sql);

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
            $_SESSION['cidade']
        );

        // INSTANCIÂNDO A CLASSE COM AS INFORMAÇÕES DO USUÁRIO E EXECUTANDO A FUNÇÃO;
    }
}
// SE NÃO TIVER SERVIÇO NA CIDADE, MOSTRARÁ O ERRO;
else{
    echo $n_encontrado;
}