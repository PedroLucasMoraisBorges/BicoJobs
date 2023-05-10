<?php 

include '../conection/protected.php';

$caminho = 'http://localhost/BicoJobs/';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BicoJobs | Regras</title>
    <link rel="stylesheet" href="../static/css/regras_css.css">

    <style>
        <?php include '../static/css/nav_css.php'; ?>
    </style>
</head>
<body>
    <div id="pageContainer">
        
        <?php include 'componentes/nav.html';?>

        <main>
            <section class="info">
                <span class="local">Juazeiro Do Norte - CE</span>
                <h1>Regras</h1>
                <div class="accordion">
                    <div class="accordion-component is_closed">
                        <h2 class="dropdown-activer">Sobre a Plataforma <img src="../media/svg's/dropdown-arrow.svg" alt="arrow for dropdownmenu"></h2>
                        <ul>
                            <li>
                                1- Os usuários são responsáveis pelo conteúdo que postam e que qualquer atividade ilegal ou inadequada resultará na suspensão ou cancelamento da conta.
                            </li>
                            <li>
                                2- O site possui todos os direitos autorais, marcas registradas e outras propriedades intelectuais em relação ao site e seu conteúdo.
                            </li>
                            <li>
                                3- Ao site, é resgauardado quaisquer disposições adicionais, como a capacidade de alterar os termos ou encerrar o serviço a qualquer momento, bem como o foro para resolução de conflitos.
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="accordion-component is_closed">
                        <h2 class="dropdown-activer">Regras para os prestadores de serviço <img src="../media/svg's/dropdown-arrow.svg" alt="arrow for dropdownmenu"></h2>
                        <ul>
                            <li>
                                1- Os usuários devem fornecer informações precisas e verdadeiras sobre si mesmos, bem como sobre os serviços oferecidos ou solicitados.
                            </li>
                            <li>
                                2- É proibido o uso de linguagem ofensiva, discriminatória ou inadequada na plataforma.
                            </li>
                            <li>
                                3- Os usuários devem respeitar os direitos autorais e de propriedade intelectual ao oferecer ou solicitar serviços.
                            </li>
                            <li>
                                4- É proibido o uso da plataforma para fins ilegais ou fraudulentos.
                            </li>
                            <li>
                                5- Os usuários devem manter um comportamento profissional e cortês ao interagir com outros usuários na plataforma.
                            </li>
                            <li>
                                6- A plataforma se reserva o direito de remover qualquer conteúdo ou usuário que viole as regras estabelecidas.
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="accordion-component is_closed">
                        <h2 class="dropdown-activer">Regras para os clientes <img src="../media/svg's/dropdown-arrow.svg" alt="arrow for dropdownmenu"></h2>
                        <ul>
                            <li>
                                1- Os usuários devem fornecer informações precisas e verdadeiras sobre si mesmos, bem como sobre os serviços oferecidos ou solicitados.
                            </li>
                            <li>
                                2- É proibido o uso de linguagem ofensiva, discriminatória ou inadequada na plataforma.
                            </li>
                            <li>
                                3- Os usuários devem respeitar os direitos autorais e de propriedade intelectual ao oferecer ou solicitar serviços.
                            </li>
                            <li>
                                4- É proibido o uso da plataforma para fins ilegais ou fraudulentos.
                            </li>
                            <li>
                                5- Os usuários devem manter um comportamento profissional e cortês ao interagir com outros usuários na plataforma.
                            </li>
                            <li>
                                6- A plataforma se reserva o direito de remover qualquer conteúdo ou usuário que viole as regras estabelecidas.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <div class="img-centralizer">
                <img src="../media/svg's/cell.svg" alt="cellphone image">
            </div>
        </main>
        
        <?php include 'componentes/footer.html';?>
    </div>

    <script src="../static/js/regras.js"></script>
    <script src="<?php echo $caminho."static/js/nav.js"?>"></script>
</body>
</html>