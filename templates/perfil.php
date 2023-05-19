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


    <main onclick="fechar_op()">
        <div class="pesquisa">
            <div class="titulo">
                <p><?php echo $_SESSION['cidade'];?></p>
                <h1>Perfil</h1>
            </div>
        </div>

        <div class="meio">
            <div class="left">
                <img src="<?php echo $caminho."media/img_perfis/".$_SESSION['img_perfil'];?>" alt="">
                <div class="habilidades">
                    <h3>Proeficiência:</h3>
                    <p><?php echo $_SESSION['habilidades']?></p>
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
                        <p><?php echo $_SESSION['nome_comp']?></p>
                    </div>

                    <div class="linguas">
                        <h3>Fluente em:</h3>
                        <div>
                            <p><?php echo $_SESSION['idioma']?></p>
                        </div>
                    </div>
                </div>

                <div class="contatos">
                    <div class="tel">
                        <h3>Telefone:</h3>
                        <p><?php echo $_SESSION['telefone']?></p>
                    </div>

                    <div class="email">
                        <h3>Email:</h3>
                        <p><?php echo $_SESSION['email']?></p>
                    </div>
                </div>

                <div class="descricao">
                    <h3>Descrição</h3>
                    <?php echo $_SESSION['descricao']; ?>
                </div>

                <a href="<?php echo $caminho."templates/editar_perfil.php";?>" class="edit">Editar</a>
            </div>
        </div>
    </main>

    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>
