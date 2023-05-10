<?php 
session_start();
$caminho = 'http://localhost/BicoJobs/';
include '../conection/protected.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
    <link rel="stylesheet" href="/static/css/serviços.css">
    <link rel="stylesheet" href="/static/css/nav.css">
    <link rel="stylesheet" href="../static/css/card.css">
    -->
    
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
        <div class="modal modal_mudar_tipo none">
            <div class="modal_header">
                <h2>Alterar Tipo de perfil</h2>
            </div>

            <p class="text">Você está prestes a se tornar um ofertante de serviços, quer prosseguir com esta ação?</p>

            <form action="../functions/alterar_tipo.php"  method="POST" >
                <div class="modal_footer">
                    <p class="fechar" onclick="fecharModal()">
                        Fechar
                    </p>
                    <button class="ofertar">Confirmar</button>

                </div>
            </form>
        </div>
        <div class="modal_adiconar none">

            <div class="modal_header">
                <h2>Detalhes da oferta</h2>
            </div>

            <form action="#" method="POST">
                <div class="oferta_detalhes">

                    <div class="pessoais">
                        <label for="input_img"><img src="../media/svg's/add_foto.svg" alt=""></label>
                        <input type="file" id="input_img" name="input">
                        <h3>Willian Rodrigues</h3>
                        <p>4.0</p>
                    </div>

                    <div class="oferta">

                        <div class="div_servico">
                            <label for="servico">Serviço</label>
                            <input type="text" placeholder="Professor de Mat" class="servico" id="servico" name="servico">
                        </div>

                        <div class="div_horario">
                            <label for="horario">Horário</label>
                            <input type="text" placeholder="Manhã" class="horario" id="horario" name="horario">
                        </div>

                        <div>
                            <label for="area-atuação">Área de atuação</label>
                            <input type="text" placeholder="Educação" class="area-atuacao" id="area-atuacao" name="area-atuacao" list="faixa">
                            <datalist id="faixa">
                                <option value="Educação"></option>
                                <option value="Construção"></option>
                                <option value="Alimentação"></option>
                                <option value="Digital"></option>
                                <option value="Elétrica"></option>
                                <option value="Limpeza"></option>
                                <option value="Cuidados"></option>
                                <option value="Mecânica"></option>
                                <option value="Encanamento"></option>
                                <option value="Outros"></option>
                            </datalist>
                        </div>

                        <div class="espaco_descricao">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="5" placeholder="Descreva o seu serviço..." class="descricao"  ></textarea>
                        </div>
                
                        <div class="div_valor">
                            <label for="valor">Valor</label>
                            <input type="text" name="valor" placeholder="A combinar" class="valor" id="valor" list="valores">
                            <datalist id="valores">
                                <option value="A combinar"></option>
                            </datalist>
                        </div>
                
                        <div>
                            <label for="contato">Contato</label>
                            <input type="text" name="contato" placeholder="(88) 99999-9999" class="contato" id="contato" list="contatos">
                            <datalist id="contatos">
                                <option value="Contato 1"></option>
                                <option value="Contato 2"></option>
                            </datalist>
                        </div>

                    </div>
                </div>
                <hr>

                <div class="modal_footer">
                    <p class="fechar" onclick="fecharModal_add()">
                        Fechar
                    </p>

                    <button class="ofertar">Ofertar</button>
                </div>
            </form>
        </div>
    </div>


    <header>
        <img src="<?php echo $caminho.'/media/Logo.svg'?>" alt="Logo BicoJobs" class="logo">

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
            <p class="nome_perfil"><?php echo $_SESSION['nome']; ?> </p>
            <div class="img"><img src="../media/svg's/perfil.svg" alt="perfil"></div>
        </div>

        <div class="opçoes op_none">
            <a href="<?php echo $caminho."templates/perfil.php"?>" >Perfil</a>
            <div></div>
            <a href="<?php echo $caminho."conection/logout.php"?>">Sair</a>
        </div>
    </header>
    

    <main onclick="fechar_op()">
        <div class="pesquisa">

            <div class="titulo">
                <p>Juzaeiro do Norte - CE</p>
                <h1>Serviços</h1>
            </div>

            <div class="campo_pesquisa">
                <input type="text" class="campo" placeholder="Buscar serviços..." onclick="ativate()">
                
                <button class="botao_pesquisa"><img src="../media/svg's/search.svg" alt="Lupa"></button>


                <button class="adicionar" onclick="<?php 
                if($_SESSION['tipo_user'] != 0){
                    echo "adicionar()";
                }
                else{
                    echo "mudar_tipo()";
                }
                ?>">
                    <img src="../media/svg's/plus.svg" alt="Adicionar">
                    <p>Anunciar o seu serviço</p>
                </button>
            </div>

        </div>

        <div class="conteudo">
            <div class="geral">
                <div class="card">
                    <img src="<?php echo $caminho."media/limp.svg"?>" alt="#" class="img_fundo">

                    <img src="<?php echo $caminho."media/fundo_azul.svg"?>" alt="" class="fundo_azul">

                    <div class="card_detalhes">


                        <div class="info_princ">
                            <!--Deixei assim pq vou ter que abrir o php para mudar o nome do arquivo-->
                            <img src="<?php echo $caminho."media/area-atuação/limpeza.svg"?>" alt="">
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
                                    <!--Deixei assim pq vou ter que abrir o php para mudar o nome do arquivo-->
                                    <img src="<?php echo $caminho."media/area-atuação/limpeza.svg"?>" alt="">
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
                            <a href="#"> Contatar </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    
    <footer onclick="fechar_op()">
        <div class="copy">
            <img src="<?php echo $caminho."media/svg's/copyright.svg"?>" alt="">
            <p>2023. Todos os direitos reservados.</p>
        </div>

        <img src="<?php echo $caminho."media/Logo.svg"?>" alt="" class="logo">

        <div class="contact">
            <a href="#">
                <img src="<?php echo $caminho."media/svg's/instagram.svg"?>" alt="">
            </a>
            <a href="#">
                <img src="<?php echo $caminho."media/svg's/whatsapp.svg"?>" alt="">
            </a>
            <a href="#">
                <img src="<?php echo $caminho."media/svg's/email.svg"?>" alt="">
            </a>
        </div>
    </footer>

    <script src="<?php echo $caminho."static/js/servicos.js"?>"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>