<?php
session_start();
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
                <div class="card">
                    <img src="../media/limp.svg" alt="#" class="img_fundo">

                    <img src="../media/fundo_azul.svg" alt="" class="fundo_azul">

                    <div class="card_detalhes">


                        <div class="info_princ">
                            <img src="../media/area-atuação/limpeza.svg" alt="">
                            <h2>Faxina</h2>
                        </div>
                        

                        <div class="info_sec">
                            <p><strong>Horário:</strong> Manhã/Tarde</p>
                            <p><strong>Valor:</strong> A combinar</p>
                            <p><strong>Pedro</strong> 3.0</p>
                        </div>
                        
                    </div>

                    <div class="botao_abrir" onclick="verOferta()">
                        <p>Abrir</p>
                    </div>

                    
                    <div class="modal_verOferta none">
                        <div class="modal_header">
                            <h2>Detalhes da oferta</h2>
                        </div>
                        <div class="oferta_detalhes">
                            <div class="pessoais">
                                <div class="img">
                                    <img src="../media/area-atuação/limpeza.svg" alt="">
                                </div>
                                <h3>Willian Rodrigues</h3>
                                <p>4.0</p>
                            </div>
                            <div class="oferta">
                                <p><strong>Serviço: </strong>Encanador</p>
                                <p><strong>Horário: </strong>Tarde</p>
                                <p><strong>Descrição: </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores inventore voluptatum eius maiores nulla nesciunt blanditiis libero similique voluptates deserunt fugit quidem explicabo architecto, dicta quo magni repellendus aspernatur cum!</p>
                                <p><strong>Valor: </strong>A combinar</p>
                                <p><strong>Contato: </strong>(88) 99999-9999</p>
                            </div>
                        </div>
                        <hr>
                        <div class="modal_footer">
                            <button class="fechar" onclick="fecharModal()">
                                Fechar
                            </button>
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