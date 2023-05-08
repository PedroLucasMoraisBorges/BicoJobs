<?php 
$caminho = 'http://localhost/BicoJobs/';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/landing_page.css">

    <style>
    <?php
        include '../static/css/landing_page_css.php';
    ?>
    </style>

    <title>BicoJobs</title>
</head>

<body>
    <header>
        <div class="top-bar">
            <img src="../media/Logo.svg" alt="">
            <nav>
                <li class="nav-option"><a href="#">Funcionalidades</a></li>
                <li class="nav-option"><a href="#">Sobre Nós</a></li>
                <li class="nav-option"><a href="#">Contate-nos</a></li>
                <li><a href="<?php echo $caminho."templates/log-cad.php"?>" class="signup-link">Cadastre-se</a></li>
            </nav>
        </div>
        <section class="call-to-action">
            <div>
                <h1>BicoJobs</h1>
                <p>A melhor opção para quem quer trabalhar de forma autônoma e ainda ser valorizado pelos serviços prestados!</p>
                <a href="<?php echo $caminho."templates/log-cad.php"?>" class="signin-link">Procure Bicos!</a>
            </div>
            <img src="../media/landing_page/img_1_lp.png" alt="people at services">
        </section>
        <img src="../media/landing_page/Rectangle 56.svg" alt="waves" class="waves">
    </header>
    <main>
        <section class="funcionalidades">
            <h2>Funcionalidades</h2>
            <article class="func">
                <img src="../media/landing_page/img_2_lb.png" alt="image of people working">
                <div class="func-info">
                    <h3>Oferte Bicos</h3>
                    <p>Está com algum problema e precisa de alguém para resolver?
                        Não se preocupe, o BicoJobs traz a solução, divulgue seu serviço em nossa plataforma e em pouco tempo receba solicitações de  pessoas interessadas em te ajudar.</p>
                </div>
            </article>
            <article class="func func-middle">
                <div class="img">
                    <img  class="top-layer" src="../media/landing_page/img_3_lb.svg" alt="image of people according with a plan">
                </div>
                <div class="func-info">
                    <h3>Faça bicos</h3>
                    <p>Precisando de uma graninha extra? Na nossa plataforma você encontrará pessoas com serviços a serem realizados, que tal dar uma olhadinha e ver o que você pode fazer para ajudá-las e ainda receber por isso! Contamos com você!</p>
                </div>
            </article>
            <article class="func func-end">
                <img src="../media/landing_page/img_4_lb.png" alt="image of people working">
                <div class="func-info">
                    <h3>Sobre Nós</h3>
                    <p>Somos uma equipe focada em conectar as pessoas que buscam criar uma fonte extra de renda e as que precisam de trabalhos diversos, como editar vídeos ou até mesmo instalar o seu novo chuveiro elétrico.</p>
                    <p>  Um projeto acadêmico coletivo em desenvolvimento feito pelos alunos do Curso de Analise e Desenvolviemento de Sistemas e Sistemas de Informação da Universidade Faculdade Paraíso.</p>
                </div>
            </article>
        </section>

        <div class="messageReceiveConfirmation" id="messageSendSignal"> 
            <img src="../media/svg's/email.svg" alt="email logo (carta)">
            <div>
                <p>Mensagem enviada com sucesso!</p>
                <p>Agradecemos o Contato!</p>
            </div>
        </div>

        <section class="email-form">
            <div>
                <h2>Fale Conosco!</h2>
                <p>Envie um e-mail:</p>
                <form>
                    <input placeholder="Nome" name="FNAME" id="nameCamp">
                    <p class="error-log"></p>
                    <input placeholder="Email" id="emailCamp" name="EMAIL" type="email">
                    <p class="error-log"></p>
                    <input placeholder="Mensagem" id="messageCamp">
                    <p class="error-log"></p>
                    <button class="send-button" id="sendButton" id="buttonEmail"><img src="../media/landing_page/post-icon.svg" alt="post img" class="post-icon"> Enviar e-mail</button>
                </form>
            </div>
            <img src="../media/landing_page/img_5_lb.svg" alt="decorative image of a plant, a portrait and a seat">
        </section>
    </main>

    <footer>
        <div class="copy">
            <img src="../media/svg's/copyright.svg" alt="copyright logo">
            <p>2023. Todos os direitos reservados.</p>
        </div>

        <img src="../media/Logo.svg" alt="" class="logo">

        <div class="contact">
            <a href="#">
                <img src="../media/svg's/instagram.svg" alt="logo do instagram">
            </a>
            <a href="#">
                <img src="../media/svg's/whatsapp.svg" alt="logo do whatsapp">
            </a>
            <a href="#">
                <img src="../media/svg's/email.svg" alt="logo email (carta)">
            </a>
        </div>
    </footer>

    <script src="../static/js/landing_page.js"></script>

</body>

</html>