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
        <div class="modal_adiconar none">

            <div class="modal_header">
                <h2>Detalhes da oferta</h2>
            </div>

            <form action="#" method="POST">
                <div class="oferta_detalhes">

                    <div class="pessoais">
                        <label for="input_img"><img src="<?php echo $caminho."/media/svg's/add_foto.svg"?>" alt=""></label>
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
            </form>

            <hr>

            <div class="modal_footer">
                <button class="fechar" onclick="fecharModal_add()">
                    Fechar
                </button>

                <button class="ofertar">Ofertar</button>
            </div>
        </div>
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
