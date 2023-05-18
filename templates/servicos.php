<?php 
session_start();
require_once("../conection/conection.php");

if($_SESSION['tipo_usuario'] == 1){
    require_once("../functions/retornar_idioma_contato.php");
}

$caminho = 'http://localhost/BicoJobs/';
?>

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
    <title>BicoJobs | Serviços</title>
</head>


<body>
    <div class="modal_fundo none">
        <?php include 'componentes/modal_mudar_tipo.php'; ?>
        <?php include 'componentes/adicionar_serv.html'; ?>
    </div>

    <?php include 'componentes/nav.php';?>

    <div class="error-msg" id="error-msg-login"></div>


    <main onclick="fechar_op()">
        <div class="pesquisa">

            <div class="titulo">
                <p><?php echo $_SESSION['cidade'];?></p>
                <h1>Serviços</h1>
            </div>

            <div class="campo_pesquisa">
                <form action="../functions/mostrar_servico.php" method="POST">
                    <input type="text" class="campo" name="search" placeholder="Buscar serviços..." onclick="ativate()">
                    
                    <button class="botao_pesquisa" name="submit"><img src="../media/svg/search.svg" alt="Lupa"></button>
                </form>


                <button class="adicionar" onclick="<?php 
                if($_SESSION['tipo_usuario'] != 0){
                    echo "adicionar()";
                }
                else{
                    echo "mudar_tipo()";
                }
                ?>">
                    <img src="../media/svg/plus.svg" alt="Adicionar">
                    <p>Anunciar o seu serviço</p>
                </button>
            </div>

        </div>

        <div class="conteudo">
            <div class="geral">
                <?php
                    include("../functions/mostrar_servico.php");

                    if($sql_query->num_rows > 0){
                        while($row = $sql_query->fetch_assoc()){
                            $id_usuario = $row['id_usuario'];
                            $nome = $row['nome'];
                            $descricao = $row['descricao'];
                            $horario = $row['horario'];
                            $img_fundo = $row['img_servico'];
                            $valor = $row['valor'];
                            if($valor == 0.0){
                                $valor = "A combinar";
                            }

                            $sql = "SELECT * FROM usuario WHERE id = $id_usuario";
                            $sql_result = $mysqli->query($sql);
                            $user = $sql_result->fetch_assoc();
                            
                            
                            
                            $nome_comp_ofertante = $user['nome_comp'];
                            $nome_user = $user['nome'];
                            $avaliacao = $user['avaliacao'];

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
                                    <p><strong>$nome_user</strong>   $avaliacao</p>
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