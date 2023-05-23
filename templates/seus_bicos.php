<?php 
session_start();
$caminho = 'http://localhost/BicoJobs/';

require_once("../functions/mostrar_meus_servico.php");
require_once "../autoload.php";
use Pi\Bicojobs\Model\Servico;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    <?php 
        include '../static/css/seus_bicos_css.php';
        include '../static/css/nav_css.php';
        include '../static/css/card_css.php';
        include '../static/css/servicos_css.php';
    ?>
    </style>
    <title>BicoJobs | Seus Bicos</title>
</head>
<body>

    <div class="modal_fundo none">
        <?php include 'componentes/adicionar_serv.html'; ?>
    </div>

    
    <?php include 'componentes/nav.php';?>


    <main onclick="fechar_op()">
        <div class="pesquisa">

            <div class="titulo">
                <p><?php echo $_SESSION['cidade'];?></p>
                <h1>Meus Bicos</h1>
            </div>

            <div class="campo_pesquisa">
                <form action="#" method="GET">
                    <input type="text" class="campo" name="search" placeholder="Buscar serviços..." onclick="ativate()">
                    
                    <button class="botao_pesquisa" name="submit"><img src="../media/svg/search.svg" alt="Lupa"></button>
                </form>

                <button class="adicionar" onclick="adicionar()">
                    <img src="<?php echo $caminho."media/svg/plus.svg"?>" alt="Adicionar">
                    <p>Anunciar o seu serviço</p>
                </button>
            </div>
        </div>

        

        <div class="conteudo">

        
            <!-- SERVIÇOS ATIVOS -->

            <h3>Servços ativos</h3>
            <div class="geral ativos">
                <?php
                    $sql_query = $pdo->query($sql." AND estado = 0");
                    if($sql_query->rowCount() > 0){
                        while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){

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


                        }
                    }
                    else{
                        echo $n_encontrado;
                    }
                ?>
            </div>


            <!-- SERVIÇOS AGUARDANDO CONFIRMAÇÃO -->

            <h3>Serviços aguardando confirmação</h3>
            <div class="geral aguardo">
                <?php
                $sql_query = $pdo->query($sql." AND estado = 1");
                if($sql_query->rowCount() > 0){
                    while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){

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


                    }
                }
                else{
                    echo $n_encontrado;
                }
                ?>
            </div>


            <!-- SERVIÇOS EM ANDAMENTO -->

            <h3>Serviços em andamento</h3>
            <div class="geral andamento">
                <?php
                    $sql_query = $pdo->query($sql." AND estado = 2");
                    if($sql_query->rowCount() > 0){
                        while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){

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


                        }
                    }
                    else{
                        echo $n_encontrado;
                    }
                ?>
            </div>
        </div>
        
    </main>
    
    <?php include 'componentes/footer.html';?>

    <script src="<?php echo $caminho."static/js/servicos.js"?>"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>
