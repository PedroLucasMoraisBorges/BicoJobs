<div class="modal modal_mudar_tipo none">
    <div class="modal_header">
        <h2>Complete o seu cadastro</h2>
    </div>

    

    <form action="<?php echo $caminho."functions/alterar_tipo.php"?>" method="POST" enctype="multipart/form-data">


        <div class="forms">
            <div>
                <label for="img_perfil">
                    <img src="<?php echo $caminho."media/svg/add_foto.svg"?>" alt="">
                </label>
                <input type="file" require name="img_perfil" id="img_perfil" style="display: none;">
            </div>
            
            <div class="inputs">
                <div>
                    <label for="nome_comp">Nome completo:</label>
                    <input type="text" name="nome_comp" placeholder="Nome completo" required>
                </div>

                <div>
                    <div>
                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" id="descricao" cols="75" rows="5" required></textarea>
                    </div>
                </div>

                <div class="div_inp">
                    <div>
                        <label for="habilidade">Habilidades:</label>
                        <input type="text" name="habilidade" id="habilidade" autocomplete="off" placeholder="Motorista" required>
                    </div>
                
                    <div>
                        <label for="idioma">Idiomas:</label>
                        <input type="text" id="idioma" name="idioma" autocomplete="off" placeholder="Português" required>
                    </div>

                    <div>
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" placeholder="(88) 99999-9999" required>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal_footer">
            <hr>
            <p class="fechar" onclick="fecharModal2()">
                Fechar
            </p>
            <button class="ofertar">Confirmar</button>
        </div>
    </form>
</div>