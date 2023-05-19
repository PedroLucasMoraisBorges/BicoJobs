<?php
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
                    <p>4.0</p>
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
                
                
                <a href='$contatar' target = '_blank' onclick='fecharModal()'>
                    <form action='#' method = 'GET'>
                        <label for'mudar_estado'>Fazer Contato</label>
                        <input type'submit' class = 'none' name = 'mudar_estado_1'>
                    </form>
                </a>
                
                
            </div>
        </div>
    </div>";

    