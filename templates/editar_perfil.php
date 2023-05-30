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
        include '../static/css/nav_css.php';
        include '../static/css/perfil_css.php';
    ?>
    </style>
    <title>BicoJobs | Editar Perfil</title>
</head>
<body>
    
    <?php include 'componentes/nav.php';?>
    <div class="error-msg" id="error-msg-login"></div>

    <form onclick="fechar_op()" action="../functions/editar_perfil.php" method="POST" enctype="multipart/form-data">
        <div class="pesquisa">
            <div class="titulo">
                <h1>Editar Perfil</h1>
            </div>
        </div>

        <div class="meio">
            <div class="left">
                <label for="img_perfil" class="label_img">
                    <img src="<?php echo $caminho."media/img_perfis/".$_SESSION['img_perfil'];?>" alt="">
                </label>
                <input type="file" require name="img_perfil" id="img_perfil" style="display:none" value="">
                <div class="habilidades">
                    <h3>Proeficiência:</h3>
                    <input type="text" value="<?php echo $_SESSION['habilidades']?>" name="habilidade" placeholder="Habilidades" required>
                </div>
            </div>

            <div class="right">
                <div class="nome-cep">
                    <div>
                        <h3>Nome de usuario</h3>
                        <h2><input type="text" value="<?php echo $_SESSION['nome']?>" name="nome" placeholder="nome"></h2 required>
                    </div>

                    <div>
                        <h3>CEP</h3>
                        <input type="text" name="cep" placeholder="CEP" required>
                    </div>
                </div>

                <div class="info_pessoais">
                    <div class="nome_comp">
                        <h3>Nome completo:</h3>
                        <input type="text" value="<?php echo $_SESSION['nome_comp']?>" name="nome_comp" placeholder="Nome completo" required>
                    </div>

                    <div class="linguas">
                        <h3>Fluente em:</h3>
                        <div>
                            <input type="text" value="<?php echo $_SESSION['idioma']?>" name="idioma" placeholder="Idioma" required>
                        </div>
                    </div>
                </div>

                <div class="contatos">
                    <div class="tel">
                        <h3>Telefone:</h3>
                        <input type="text" value="<?php echo $_SESSION['telefone']?>" name="telefone" placeholder="Telefone" required>
                    </div>

                    <div class="email">
                        <h3>Email:</h3>
                        <input type="text" value="<?php echo $_SESSION['email']?>" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="descricao_edit">
                    <h3>Descrição</h3>
                    <textarea name="descricao" id="descricao" cols="30" rows="10"  placeholder="Descrição" required><?php echo $_SESSION['descricao'];?></textarea>
                </div>

                <div class="buttons">
                    <a href="<?php echo $caminho."templates/perfil.php";?>">Cancelar</a>
                    <button>Salvar</button>
                </div>
            </div>
        </div>
    </form>

    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>
