<?php 
session_start();
@include("../conection/conection.php");
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
        <input type="text" class="campo" placeholder="Buscar serviços..." onclick="ativate()">
        
        <button class="botao_pesquisa"><img src="<?php echo $caminho."media/svg/search.svg"?>" alt="Lupa"></button>

        <button class="adicionar" onclick="adicionar()">
            <img src="<?php echo $caminho."media/svg/plus.svg"?>" alt="Adicionar">
            <p>Anunciar o seu serviço</p>
        </button>
    </div>


    <div class="conteudo">
        <div class="geral">
        <?php
        $user_id = $_SESSION['id'];
        $sql = "SELECT * FROM servico WHERE id_usuario = '$user_id'";

        $result = $mysqli->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $nome_comp_ofertante = $_SESSION['nome_comp'];
                $avaliacao = $_SESSION['avaliacao'];
                $nome_user_ofertante = $_SESSION['nome'];

                $nome = $row['nome'];
                $descricao = $row['descricao'];
                $horario = $row['horario'];
                $img_fundo = $row['img_servico'];
                $valor = $row['valor'];
                if($valor == 0.0){
                    $valor = "A combinar";
                }

                echo "<div class='card'>
            <img src='$caminho/media/limp.svg' alt='#' class='img_fundo'>

            <img src='$caminho/media/fundo_azul.svg' alt='' class='fundo_azul'>

            <div class='card_detalhes'>


                <div class='info_princ'>
                    <img src='$caminho/media/area-atuação/limpeza.svg' alt=''>
                    <h2>$nome</h2>
                </div>
                

                <div class='info_sec'>
                    <p><strong>Horário:</strong> $horario</p>
                    <p><strong>Valor:</strong> $valor</p>
                    <p><strong>$nome_user_ofertante</strong>   $avaliacao</p>
                </div>
                
            </div>

            <div class='botao_abrir' onclick='verOferta()'>
                <p>Abrir</p>
            </div>

            
            <div class='modal_verOferta none'>
                <div class='modal_header'>
                    <h2>Detalhes da oferta</h2>
                </div>
                <div class='oferta_detalhes'>
                    <div class='pessoais'>
                        <div class='img'>
                            <img src='$caminho/media/area-atuação/limpeza.svg' alt=''>
                        </div>
                        <h3>$nome_comp_ofertante</h3>
                        <p>4.0</p>
                    </div>
                    <div class='oferta'>
                        <p><strong>Serviço: </strong>$nome</p>
                        <p><strong>Horário: </strong>$horario</p>
                        <p><strong>Descrição: </strong>$descricao</p>
                        <p><strong>Valor: </strong>$valor</p>
                        <p><strong>Contato: </strong>(88) 99999-9999</p>
                    </div>
                </div>
                <hr>
                <div class='modal_footer'>
                    <button class='fechar' onclick='fecharModal()'>
                        Fechar
                    </button>
                </div>
            </div>
        </div>";
            }
        }?>
        </div>
    </div>
        
    </main>
    
    <?php include 'componentes/footer.html';?>

    <script src="<?php echo $caminho."static/js/servicos.js"?>"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>
