<?php
    require_once("../templates/servicos.php");
    require_once "../autoload.php";
        
    use Pi\Bicojobs\Model\User;
    use Pi\Bicojobs\Model\Verificacoes;
    use Pi\Bicojobs\Infraestrutura\Persistencia\CriadorConexao;
    $pdo = CriadorConexao::criarConexao();

    if(isset($_FILES['img_perfil'])){
        $arquivo = strtolower(substr($_FILES['img_perfil']['name'], -4));
        $novo_nome = md5(time()) . $arquivo;
        $diretorio = "../media/img_perfis/";
        move_uploaded_file($_FILES['img_perfil']['tmp_name'] , $diretorio.$novo_nome);
    }

    $usuario = new User(
        $_SESSION["id"],
        $_SESSION["nome"],
        $_SESSION["dt_nascimento"],
        $_SESSION["cpf"],
        $_SESSION["id_cidade"],
        $_SESSION['senha'],
        $_SESSION['tipo_usuario'],
        $_SESSION['id_contato'],
        1
    );

    $verificacao = new Verificacoes();
    $v_telefone = $verificacao->verificaTel($pdo, $_POST['telefone'], $_SESSION['id']);

    if($v_telefone == 0){
        $usuario->alterar_tipo(
            $_SESSION["id"],
            $pdo,
            $novo_nome,
            $_POST['descricao'],
            $_POST['habilidade'],
            $_POST['idioma'],
            $_POST['telefone'],
            $_POST['nome_comp'],
            $usuario
        );
    }
