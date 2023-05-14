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
    <title>BicoJobs | Seus Bicos</title>
</head>
<body>
    
    <?php include 'componentes/nav.php';?>


    <form onclick="fechar_op()" action="#" method="POST" enctype="multipart/form-data">
        <div class="pesquisa">
            <div class="titulo">
                <input type="text" value="<?php echo $_SESSION['cep'];?>">
                <h1>Perfil</h1>
            </div>
        </div>

        <div class="meio">
            <div class="left">
                <label for="img_perfil">
                    <img src="<?php echo $caminho."media/img_perfis/".$_SESSION['img_perfil'];?>" alt="">
                </label>
                <input type="file" require name="img_perfil" id="img_perfil">
                <div class="habilidades">
                    <h3>Proeficiência:</h3>
                    <input type="text" value="<?php echo $_SESSION['habilidades']?>" placeholder="Habilidades">
                </div>
            </div>

            <div class="right">
                <div class="nome">
                    <p><?php echo $_SESSION['avaliacao']?></p>
                    <h2><?php echo $_SESSION['nome']?></h2>
                </div>

                <div class="info_pessoais">
                    <div class="nome_comp">
                        <h3>Nome completo:</h3>
                        <input type="text" value="<?php echo $_SESSION['nome_comp']?>" placeholder="Nome completo">
                    </div>

                    <div class="linguas">
                        <h3>Fluente em:</h3>
                        <div>
                            <input type="text" value="<?php echo $_SESSION['idioma']?>" placeholder="Idioma">
                        </div>
                    </div>
                </div>

                <div class="contatos">
                    <div class="tel">
                        <h3>Telefone:</h3>
                        <input type="text" value="<?php echo $_SESSION['telefone']?>" placeholder="Telefone">
                    </div>

                    <div class="email">
                        <h3>Email:</h3>
                        <p><?php echo $_SESSION['email']?></p>
                    </div>
                </div>

                <div class="descricao">
                    <h3>Descrição</h3>
                    <textarea name="descricao" id="descricao" cols="30" placeholder="<?php echo $_SESSION['descricao'];?>" rows="10"></textarea>
                </div>

                <button>Salvar</button>
            </div>
        </div>
    </form>

    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>
