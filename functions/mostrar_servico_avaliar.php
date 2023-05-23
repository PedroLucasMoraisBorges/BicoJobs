<?php
require_once("../templates/ultimos_bicos.php");
// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;

require_once("../autoload.php");
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
use Pi\Bicojobs\Model\Servico;
$pdo = CriadorConexao::criarConexao();

// AUTOLOAD DOS ARQUIVOS COM AS CLASSES;


$id = $_SESSION['id'];
$sql = "SELECT * FROM servicoavaliar WHERE id_usuario = $id";
$sql_query_servico_aval = $pdo->query($sql);

if($sql_query_servico_aval -> rowCount() > 0){
    while($row = $sql_query_servico_aval->fetch(PDO::FETCH_ASSOC)){
        $id_serv = $row['id_servico'];
    
        $sql = "SELECT * from servico WHERE id = $id_serv AND estado = 0";
        $sql_query = $pdo->query($sql);
    
    
        $sql_query = $pdo->query($sql);

        if($sql_query->rowCount() > 0){
            while($servico = $sql_query->fetch(PDO::FETCH_ASSOC)){
    
                $servico = new servico(
                    $_SESSION['id_cidade'],
                    $servico['nome'],
                    $servico['valor'],
                    $servico['descricao'],
                    $servico['estado'],
                    $servico['horario'],
                    $servico['img_servico'],
                    $servico['contato'],
                    $servico['id_categoria'],
                    $servico['id_usuario']
                );
    
                
                $servico->mostrarServicos(
                    $pdo, 
                    $id_serv, 
                    $id, 
                    $_SESSION['nome'], 
                    $_SESSION['cidade'],
                    1,
                    $_SESSION['id']
                );
    
    
            }
        }
        else{
            echo '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Você não tem nenhum serviço no momento</p>
            </div>';
        }
        }
}
else{
    echo '<div class="read_list"> 
    <img src="../media/svg/read_list.svg" alt="Read List">
    <p>Você não tem nenhum serviço no momento</p>
    </div>';
}


/*
// VERIFICANDO SE HOUVE PESQUISA



if(isset($_GET['submit'])){
    
    $search = $_GET['search'];
    $id_cidade = $_SESSION['id_cidade'];

    // SE A PESQUISA CORRESPONDER TANTO AO NOME QUANTO A CATEGORIA DO SERVICO, MOSTRARÁ AMBOS RESULTADOS;
    $sql = "SELECT * FROM categoria WHERE categoria = '$search'";
    $sql_query = $pdo->query($sql);

    if($sql_query->rowCount() > 0){
        $id_categoria = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];
        $sql = "SELECT * FROM servicoavaliar WHERE id_usuario = $id AND nome = '$search' OR id_categoria = '$id_categoria'";

        // CASO NÃO SEJA ENCONTRADO NENHUM MOSTRARÁ MENSAGEM DE ERRO;
        $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Não foi encontrado nenhum serviço que atenda a sua pesquisa</p>
            </div>';
    }
    else{
        $sql = "SELECT * FROM servicoavaliar WHERE id_usuario = $id AND nome = '$search'";

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
    $sql = "SELECT * FROM servicoavaliar WHERE id_usuario = $id";
    $n_encontrado =  '<div class="read_list"> 
            <img src="../media/svg/read_list.svg" alt="Read List">
            <p>Você não tem nenhum serviço no momento</p>
            </div>';

}
*/