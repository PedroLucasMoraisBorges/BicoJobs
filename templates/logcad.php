<?php 
// start da sessao
if(!isset($_SESSION)){
    session_start();
}

$caminho = 'http://localhost/BicoJobs/';
include("../conection/conection.php");
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include '../static/css/log_cad_css.php'; ?>
    </style>


    <title>BicoJobs</title>
</head>

<body>
    <div class="back"></div>

    <section class="main">

        <div class="img" id="slideImg">
            <div class="img-cad">
                <img src="<?php echo $caminho."media/img_cad.svg"; ?>" alt="Pessoas se ajudando">
                <div class="texto">
                    <h2>BicoJobs</h2>
                    <p>A melhor opção para quem quer trabalhar de forma autônoma e ainda ser valorizado pelos serviços prestados!</p>
                </div>
            </div>

            <div class="img-log">
                <img src="<?php echo $caminho."media/img_login.svg"; ?>" alt="Pessoa organizando uma lista">
                <div class="texto">
                    <p>É um prazer vê-lo(a) novamente</p>
                    <p>Mais oportunidades estão a sua espera, <strong>APROVEITE!</strong></p>
                </div>
            </div>
        </div>


        <form action="../functions/login.php" method="POST" class="log">
            <h1>Login</h1>

            <input type="text" placeholder="Usuário ou Email" id="user" name="user_log" class="text">

            <input type="password" name="password_log" placeholder="Senha" id="senha" class="text">

            <div class="inline">
                <div class="senha">
                    <input type="checkbox" name="ver_senha" id="ver_senha" class="check pass">
                    <label for="ver_senha" class="rad
                    ">Ver senha</label>
                </div>
                <a href="#" class="esq_senha">Esqueceu a senha?</a>
            </div>

            <div class="check_lembrar">
                <input type="checkbox" name="lembrar" id="lembrar" class="check">
                <label for="lembrar" class="rad">Lembrar de mim</label>
            </div>

            <a href="<?php echo $caminho."templates/servicos.php"; ?>" class="login" >
                <button>Entrar</button>
            </a>

            <p class="interacao">Ainda não possui conta? <a href="<?php echo $servicos;?>" onclick="slide_img()">Cadastre-se</a></p>
        </form>



        <form action="../functions/cadastro.php" method="POST" class="cad">
            
            <h1>Cadastro</h1>
            <input type="email" name="email_cad" class="text email" placeholder="Email">

            <input type="text" name="user_cad" class="text user" placeholder="Usuário">

            <input type="text" class="text" placeholder="CPF..." name="cpf">

            <input type="date" class="text" name="dtNasci" id="dtNasci">

            <input type="password" name="password_cad" class="text senha" placeholder="Senha">

            <input type="password" name="password2" class="text rep_senha" placeholder="Repetir senha">

            <div class="inline">
                <input type="checkbox" name="ver_senha" id="ver_senhaCad" class="ver_senha" onclick="ver_senha_cad()">
                <label for="ver_senhaCad" class="rad">Ver senha</label>
            </div>

            <input type="text" name="cep" class="text cep" placeholder="CEP">

            
            <button>Cadastrar</button>
            <a href="<?php echo $caminho."templates/servicos.php"; ?>" class="cadastro">
            </a>

            <p class="interacao">Já possui conta? <a href="#" onclick="slide_img()">Faça login</a></p>
        </form>

    </section>

    <script src="../static/js/log-cad.js"></script>
</body>
</html>