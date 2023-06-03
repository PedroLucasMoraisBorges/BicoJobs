<?php

    session_start();
    require_once("../autoload.php");

    use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
    use Pi\Bicojobs\Model\Servico;
    $pdo = CriadorConexao::criarConexao();

    $contatar = $_POST['contatar'];
    $id_serv = $_POST['id'];
    $id_usuario = $_SESSION['id'];

    $sql = "SELECT * FROM servico WHERE id = $id_serv";
    $sql_query = $pdo->query($sql);
    $serv = $sql_query->fetch(PDO::FETCH_ASSOC);

    $servico = new Servico(
        $serv['id_cidade'],
        $serv['nome'],
        $serv['valor'],
        $serv['descricao'],
        $serv['estado'],
        $serv['horario'],
        $serv['img_servico'],
        $serv['contato'],
        $serv['id_categoria'],
        $serv['id_usuario']
    );

    if(isset($_POST['cancelar']) == true){
        $servico -> deletarServicoAvaliacao($pdo, $id_serv);
        $servico -> alterarEstado($pdo, 0, $contatar, $id_serv ,$id_usuario);
    }
    else if(isset($_POST['confirmar']) == true){
        $servico -> alterarEstado($pdo, 2, $contatar, $id_serv, $id_usuario);
    }
    else if(isset($_POST['finalizar']) == true){
        $servico -> finalizarServico($pdo, $id_serv, $id_usuario);
        $servico -> alterarEstado($pdo, 0 , $contatar, $id_serv, $id_usuario);
    }
    else if(isset($_POST['deletar']) == true){
        $servico -> deletarServico($pdo, $id_serv, $servico);
    }
    else{
        $servico -> alterarEstado($pdo, 1, $contatar, $id_serv, $id_usuario);
    }
