<?php
include("../conection/conection.php");
require_once ("../class/user.php");
require_once("../templates/logcad.php");

//require_once("../class/user.php");

$email = $_POST['user_log'];
$senha = $_POST['password_log'];


$sql_code_contato = "SELECT id FROM contato WHERE email = '$email'";


$sql_query = $mysqli->query($sql_code_contato) or die("Falha na execução do código SQL" .$mysqli->error);
$row = $sql_query->fetch_assoc();

if($sql_query->num_rows == 1){
    $email = $row["id"];
    $sql = "SELECT * FROM usuario WHERE id_contato = '$email' AND senha = '$senha'";
    $sql_qery = $mysqli->query($sql);

    $user = $sql_qery->fetch_assoc();

    if($sql_qery -> num_rows == 0){
        echo "<script> 
        let error = document.getElementById('error-msg-login');
        error.innerHTML = 'Senha não corresponde!';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
        error.classList.remove('slide');
        }, 3250);
        </script>";
    } else{

        if(!isset($_SESSION)){
            session_start();
        }

        //Criado a sessao do USER
        $cep = $user['id_cidade'];
        $sql = "SELECT cep FROM cidade WHERE id = $cep";
        $sql_query = $mysqli->query($sql);
        $nome_cidade = $sql_query->fetch_assoc();

        

        $_SESSION["id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"];
        $_SESSION["cpf"] = $user["cpf"];
        $_SESSION["id_cidade"] = $user['id_cidade'];
        $_SESSION["dt_nascimento"] = $user["dt_nascimento"];
        $_SESSION['id_contato'] = $user['id_contato'];
        $_SESSION['tipo_user'] = $user['tipo_usuario'];
        $_SESSION['senha'] = $user['senha'];
        $_SESSION['id_idioma'] = $user['id_idioma'];
        $_SESSION['avaliacao'] = $user['avaliacao'];
        $_SESSION['nome_comp'] = $user['nome_comp'];
        $_SESSION['descricao'] = $user['descricao'];
        $_SESSION['habilidades'] = $user['habilidades'];
        $_SESSION['img_perfil'] = $user['img_perfil'];
        $_SESSION['cidade'] = $nome_cidade['cep'];

        //redicionando o user
        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }
}
else{

    echo "<script> 

        let error = document.getElementById('error-msg-login');
        error.textContent = 'Email não encontrado!';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
            error.classList.remove('slide');
        }, 3250);
    
    </script>";


}
