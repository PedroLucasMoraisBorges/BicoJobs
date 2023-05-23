<?php
$user_id = $_SESSION['id'];
echo "
    <div class='card' id='card$id'>

        <img src='$caminho/media/img_services/$this->img_servico' alt='#' class='img_fundo'>

        <img src='$caminho/media/fundo_azul.svg' alt='' class='fundo_azul'>

        <div class='card_detalhes'>


            <div class='info_princ'>
                <img src='$caminho/media/area-atuação/limpeza.svg' alt=''>
                <h2>$this->nome</h2>
            </div>
            

            <div class='info_sec'>
                <p><strong>Horário:</strong> $this->horario</p>
                <p><strong>Valor:</strong> $this->valor</p>
                <p><strong>$nome_user</strong>   $avaliacao</p>
            </div>
            
        </div>


        <button class='botao_abrir' id='btn$id' onclick='verOferta()'>
            Abrir
        </button>

        
        <div class='modal_verOferta none' id='modal_btn$id'>
            <div class='modal_header'>
                <h2>Detalhes da oferta</h2>
            </div>
            <div class='oferta_detalhes'>
                <div class='pessoais'>
                    <div class='img'>
                        <img src='$caminho/media/area-atuação/limpeza.svg' alt=''>
                    </div>
                    <h3>$nome_comp_ofertante</h3>
                    <p>$avaliacao</p>
                </div>
                <div class='oferta'>
                    <p><strong>Serviço: </strong>$this->nome</p>
                    <p><strong>Horário: </strong>$this->horario</p>
                    <p><strong>Descrição: </strong>$this->valor_descricao</p>
                    <p><strong>Valor: </strong>$this->valor</p>
                    <p><strong>Contato: </strong>$this->contato</p>
                </div>
            </div>
            <hr>
            <div class='modal_footer'>
                <button class='fechar' onclick='fecharModal()'>
                    Fechar
                </button>
                
                
                <form method = 'POST'>
                    <input type='text' name='user_id' class = 'none' value='$user_id'>
                    <input type='text' name='id' class = 'none' value='$id'>
                    <input type='text' name='contatar' class = 'none' id = 'contatar' value='$contatar'>
                    <input type='text' name='confirmar' class = 'none' id = 'contatar' value='1'>

                    <input type='submit' name = 'cancelar' value = 'Cancelar' action = '../functions/servico_mudar_estado.php'>
                    <input type='submit' name = 'confirmar' value = 'Confirmar' action = '../functions/servico_mudar_estado.php'>
                </form>
                
                
            </div>
        </div>
    </div>";

    