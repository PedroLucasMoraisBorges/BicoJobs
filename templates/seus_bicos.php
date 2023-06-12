<?php 
session_start();
$caminho = 'http://localhost/BicoJobs/';

require_once("../functions/mostrar_meus_servico.php");
require_once "../autoload.php";
use Pi\Bicojobs\Model\Servico;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
use Pi\Bicojobs\Model\Grafico;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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

            <h3>Serviços ativos</h3>
            <div class="container">
                <div class="geral ativos your-bics">
                    <?php
                        $sql_query = $pdo->query($sql." AND estado = 0");
                        if($sql_query->rowCount() > 0){
                            while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){

                                $servico = new Servico(
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
                            }
                        }
                        else{
                            echo $n_encontrado;
                        }
                    ?>
                </div>
            </div>


            <!-- SERVIÇOS AGUARDANDO CONFIRMAÇÃO -->

            <h3>Serviços aguardando confirmação</h3>
            <div class="container">
                <div class="geral aguardo your-bics">
                    <?php
                    $sql_query = $pdo->query($sql." AND estado = 1");
                    if($sql_query->rowCount() > 0){
                        while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){
                            
                            
                            $servico = new Servico(
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
                                1,
                                $_SESSION['id']
                            );
                        }
                    }
                    else{
                        echo $n_encontrado;
                    }
                    ?>
                </div>
            </div>


            <!-- SERVIÇOS EM ANDAMENTO -->

            <h3>Serviços em andamento</h3>
            <div class="container">
                <div class="geral andamento your-bics">
                    <?php
                        $sql_query = $pdo->query($sql." AND estado = 2");
                        if($sql_query->rowCount() > 0){
                            while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){
                                $servico = new Servico(
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
                                    2,
                                    $_SESSION['id']
                                );
                            }
                        }
                        else{
                            echo $n_encontrado;
                        }
                    ?>
                </div>
            </div>
        </div>



        <div class="dashboard">
            <div class="graficos">
                <div class="grafico">
                    <h2>Serviços concluídos</h2>
                    <canvas id="total_serv"></canvas>
                    <?php
                        include("../functions/retornarServicosFeitos.php");
                        $meses = $grafico -> setServicosUser($user);
                        $grafico -> retornarServicosUser($meses);
                    ?>
                </div>
                <div class="grafico">
                    <h2>Valor Ganho</h2>
                    <canvas id="total_valor"></canvas>
                    <?php
                        include("../functions/retornarServicosFeitos.php");
                        $meses = $grafico -> setServicosUser($user);
                        $grafico -> retornarServicosValor($meses);
                    ?>
                </div>
            </div>

            <div class="grafico_nota">
                <h2>Avaliações</h2>

                <div class="notas">
                    <canvas id="total_notas"></canvas>
                    <?php
                    include("../functions/retornarServicosFeitos.php");
                    $notas = $grafico -> setNotasUser($user);
                    $grafico -> retornarNotas($notas);
                    ?>

                    <div class="nota_unid">
                        <div class="nota um">
                            <div>1</div>
                            <p><?php echo $notas['1']; ?></p>
                        </div>

                        <div class="nota dois">
                            <div>2</div>
                            <p><?php echo $notas['2']; ?></p>
                        </div>

                        <div class="nota tres">
                            <div>3</div>
                            <p><?php echo $notas['3']; ?></p>
                        </div>

                        <div class="nota quatro">
                            <div>4</div>
                            <p><?php echo $notas['4']; ?></p>
                        </div>

                        <div class="nota cinco">
                            <div>5</div>
                            <p><?php echo $notas['5']; ?></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        
        
    </main>
    
    <?php include 'componentes/footer.html';?>
    <script src="<?php echo $caminho."static/js/servicos.js"?>"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>
