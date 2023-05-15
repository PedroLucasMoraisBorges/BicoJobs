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
        <p>Juzaeiro do Norte - CE</p>
        <h1>Meus Bicos</h1>
    </div>

    <div class="campo_pesquisa">
        <input type="text" class="campo" placeholder="Buscar serviços..." onclick="ativate()">
        
        <button class="botao_pesquisa"><img src="<?php echo $caminho."media/svg's/search.svg"?>" alt="Lupa"></button>

        <!--
        <div class="filtro">
            <button class="botao_filtro" onclick="abrir_filtro()"><img src="/media/svg's/filtro.svg" alt="filtro"></button>
        
            <div class="campo_filtro none">
                <button onclick="fechar_filtro()" class="fechar"><img src="/media/svg's/x.svg" alt="X"></button>

                <div class="options">
                    <div class="area">
                        <h3>Área de autação:</h3>
                        <div>
                            <input type="radio" name="area_atuacao" id="limpeza">
                            <label for="limpeza">Limpeza</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="construcao">
                            <label for="construcao">Construção</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="encanamento">
                            <label for="encanamento">Encanamento</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="eletrica">
                            <label for="eletrica">Elétrica</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="educacao">
                            <label for="educacao">Educação</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="alimentacao">
                            <label for="alimentacao">Alimentação</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="digital">
                            <label for="digital">Digital</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="cuidados">
                            <label for="cuidados">Cuidados</label>
                        </div>
                        <div>
                            <input type="radio" name="area_atuacao" id="mecanico">
                            <label for="mecanico">Mecânico</label>
                        </div>
                    </div>


                    <div class="valor">
                        <h3>Valor:</h3>
                        <div>
                            <input type="radio" name="valor" id="zero_cinquenta">
                            <label for="zero_cinquenta">De R$ 00.00 a R$ 50.00</label>
                        </div>
                        <div>
                            <input type="radio" name="valor" id="cinquenta_cem">
                            <label for="cinquenta_cem">De R$ 50.01 a R$ 100.00</label>
                        </div>
                        <div>
                            <input type="radio" name="valor" id="cem_acima">
                            <label for="cem_acima">Acima de R$ 100.00</label>
                        </div>
                        <div>
                            <input type="radio" name="valor" id="a_combinar">
                            <label for="a_combinar">A combinar</label>
                        </div>
                    </div>
                </div>

                <button class="aplicar" onclick="fechar_filtro()">Aplicar</button>
            </div>
        </div>
        -->


        <button class="adicionar" onclick="adicionar()">
            <img src="<?php echo $caminho."media/svg's/plus.svg"?>" alt="Adicionar">
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
                echo "<div class='card'>
            <img src='$caminho/media/limp.svg' alt='#' class='img_fundo'>

            <img src='$caminho/media/fundo_azul.svg' alt='' class='fundo_azul'>

            <div class='card_detalhes'>


                <div class='info_princ'>
                    <img src='$caminho/media/area-atuação/limpeza.svg' alt=''>
                    <h2>Faxina</h2>
                </div>
                

                <div class='info_sec'>
                    <p><strong>Horário:</strong> Manhã/Tarde</p>
                    <p><strong>Valor:</strong> A combinar</p>
                    <p><strong>Pedro</strong> 3.0</p>
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
                        <h3>Willian Rodrigues</h3>
                        <p>4.0</p>
                    </div>
                    <div class='oferta'>
                        <p><strong>Serviço: </strong>Encanador</p>
                        <p><strong>Horário: </strong>Tarde</p>
                        <p><strong>Descrição: </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores inventore voluptatum eius maiores nulla nesciunt blanditiis libero similique voluptates deserunt fugit quidem explicabo architecto, dicta quo magni repellendus aspernatur cum!</p>
                        <p><strong>Valor: </strong>A combinar</p>
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
