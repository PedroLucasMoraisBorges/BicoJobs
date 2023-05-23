<?php
require_once("../functions/mostrar_servico_avaliar.php");

require_once("../autoload.php");
use Pi\Bicojobs\Model\Servico;
use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
$pdo = CriadorConexao::criarConexao();


$caminho = 'http://localhost/BicoJobs/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    <?php 
        include '../static/css/servicos_css.php';
        include '../static/css/nav_css.php';
        include '../static/css/card_css.php';
    ?>
    </style>

    <title>BicoJobs | Últimos Serviços</title>
</head>
<body>

    <div class="modal_fundo none">
    </div>

    
    <?php include 'componentes/nav.php';?>


    <main onclick="fechar_op()">
        <div class="pesquisa">

            <div class="titulo">
                <p><?php echo $_SESSION['cidade'];?></p>
                <h1>Últimos serviços</h1>
            </div>

            <div class="campo_pesquisa">
                <input type="text" class="campo" placeholder="Buscar seus serviços..." onclick="ativate()">
                
                <button class="botao_pesquisa"><img src="../media/svg/search.svg" alt="Lupa"></button>
            </div>

        </div>

        <div class="conteudo">
            <div class="geral">
            <?php
                $sql_query = $pdo->query($sql);
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
    </main>

    <?php include 'componentes/footer.html';?>

    <script src="<?php echo $caminho."static/js/servicos.js"?>"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>