<?php 
$caminho = 'http://localhost/BicoJobs/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/nav.css">
    <link rel="stylesheet" href="/static/css/perfil.css">

    <style>
    <?php 
        include '../static/css/nav.php';
        include '../static/css/perfil_css.php';
    ?>
    </style>
    <title>BicoJobs | Seus Bicos</title>
</head>
<body>
    <header>
        <img src="<?php echo $caminho.'/media/Logo.svg'?>" alt="Logo BicoJobs" class="logo">

        <nav>
            <a href="#">Home</a>
            <a href="<?php echo $caminho."templates/servicos.php"?>">Serviços</a>
            <a href="<?php echo $caminho."templates/seus_bicos.php"?>">Seus Bicos</a>
            <a href="<?php echo $caminho."templates/ultimos_bicos.php"?>">Últimos serviços</a>
            <a href="<?php echo $caminho."templates/regras.php"?>">Regras</a>
        </nav>

        <div class="perfil" onclick="abrir_options()">
            <p class="nome_perfil"><?php echo $_SESSION['nome']; ?></p>
            <div class="img"><img src=<?php echo $caminho."/media/svg's/perfil.svg"?> alt="perfil"></div>
        </div>

        <div class="opçoes op_none">
            <a href="<?php echo $caminho."templates/perfil.php"?>" >Perfil</a>
            <div></div>
            <a href="sair">Sair</a>
        </div>
    </header>


    <main onclick="fechar_op()">
        <div class="pesquisa">
            <div class="titulo">
                <p>Juzaeiro do Norte - CE</p>
                <h1>Perfil</h1>
            </div>
        </div>

        <div class="meio">
            <div class="left">
                <img src="https://pbs.twimg.com/profile_images/1380598069528510466/rlqqyNbd_400x400.jpg" alt="">
                <div class="habilidades">
                    <h3>Habilidades</h3>
                    <p>Assistência técnica</p>
                    <p>Computação</p>
                </div>
            </div>

            <div class="right">
                <div class="nome">
                    <p>5.0</p>
                    <h2>Pedro Lucas</h2>
                </div>

                <div class="info_pessoais">
                    <div class="nome_comp">
                        <h3>Nome completo:</h3>
                        <p>Pedro Lucas de Morais Borges</p>
                    </div>

                    <div class="linguas">
                        <h3>Línguas:</h3>
                        <div>
                            <p>Português</p>
                            <p>Inglês</p>
                        </div>
                    </div>
                </div>

                <div class="contatos">
                    <div class="tel">
                        <h3>Telefone:</h3>
                        <p>(88) 99999-9999</p>
                    </div>

                    <div class="email">
                        <h3>Email:</h3>
                        <p>ExampleEmail@gmail.com.br</p>
                    </div>
                </div>

                <div class="descricao">
                    <h3>Descrição</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt placeat molestias ab dicta velit possimus alias, um eveniet explicabo aperiam odio voluptates, quam reiciendis corporis doloremque. A labore non vero! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, numquam earum eum laborum voluptatem consectetur rerum fugiat quod officia quam corporis et odit, necessitatibus autem, fugit velit! Exercitationem, debitis quibusdam.</p>
                </div>

                <a href="#" class="edit">Editar</a>
            </div>
        </div>
    </main>

    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>
