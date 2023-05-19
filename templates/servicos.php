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
                ?>
            </div>
        </div>
    </main>
    

    <?php include 'componentes/footer.html';?>

    <script src="<?php echo $caminho."static/js/servicos.js"?>"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>