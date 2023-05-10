<?php
include '../conection/protected.php';
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

    
    <header>
        <img src="../media/Logo.svg" alt="Logo BicoJobs" class="logo">

        <nav>
            <a href="<?php echo $caminho."templates/servicos.php"?>">Serviços</a>
            <?php 
                if($_SESSION['tipo_user'] != 0){
                    echo '<a href="../templates/seus_bicos.php">Meus Bicos</a>';
                }
            ?>
            <a href="<?php echo $caminho."templates/ultimos_bicos.php"?>">Últimos serviços</a>
            <a href="<?php echo $caminho."templates/regras.php"?>">Regras</a>
        </nav>

        <div class="perfil" onclick="abrir_options()">
            <p class="nome_perfil"><?php echo $_SESSION['nome']; ?></p>
            <div class="img"><img src="../media/svg's/perfil.svg" alt="perfil"></div>
        </div>

        <div class="opçoes op_none">
            <a href="<?php echo $caminho."templates/perfil.php"?>" class="perfil_Click_Option">Perfil</a>
            <div></div>
            <a href="<?php echo $caminho."conection/logout.php"?>" class="perfil_Click_Option">Sair</a>
        </div>
    </header>


    <main onclick="fechar_op()">
        <div class="pesquisa">

            <div class="titulo">
                <p>Juzaeiro do Norte - CE</p>
                <h1>Últimos serviços</h1>
            </div>

            <div class="campo_pesquisa">
                <input type="text" class="campo" placeholder="Buscar seus serviços..." onclick="ativate()">
                
                <button class="botao_pesquisa"><img src="../media/svg's/search.svg" alt="Lupa"></button>
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

    <footer onclick="fechar_op()">
        <div class="copy">
            <img src="/media/svg's/copyright.svg" alt="">
            <p>2023. Todos os direitos reservados.</p>
        </div>

        <img src="/media/Logo.svg" alt="" class="logo">

        <div class="contact">
            <a href="#">
                <img src="../media/svg's/instagram.svg" alt="">
            </a>
            <a href="#">
                <img src="../media/svg's/whatsapp.svg" alt="">
            </a>
            <a href="#">
                <img src="../media/svg's/email.svg" alt="">
            </a>
        </div>
    </footer>

    <script src="<?php echo $caminho."static/js/servicos.js"?>"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>