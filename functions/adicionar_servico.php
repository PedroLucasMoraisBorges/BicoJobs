<?php

    require_once "../templates/servicos.php";
    require_once "../autoload.php";
    
    use Pi\Bicojobs\Model\Servico;
    use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;

    $pdo = CriadorConexao::criarConexao();

    if($_FILES['img_input']['name'] == ""){
        $novo_nome = "general_work.svg";
    }
    else{
        $extensao = strtolower(substr($_FILES['img_input']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "../media/img_services/";
        move_uploaded_file($_FILES['img_input']['tmp_name'], $diretorio.$novo_nome);
    }
    

    $servico = new servico(
        $_SESSION['id_cidade'],
        $_POST['servico'],
        $_POST['valor'],
        $_POST['descricao'],
        0, 
        $_POST['horario'],
        $novo_nome, 
        $_POST['contato'], 
        $_POST['area-atuacao'],
        $_SESSION['id']
    );

    $servico->inserirNoDB($pdo);

    exit;