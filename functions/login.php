<?php
include("../conection/conection.php");
include("../templates/logcad.php");

$email = $_POST['user_log'];
$senha = $_POST['password_log'];



$sql_code_contato = "SELECT id FROM contato WHERE email = '$email'";
$sql_code_last_id = "SELECT id FROM contato";


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

        $_SESSION["id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"];
        $_SESSION["cep"] = $user['id_cidade'];
        $_SESSION['id_contato'] = $user['id_contato'];
        $_SESSION['tipo_user'] = $user['tipo_usuario'];
        $_SESSION['senha'] = $user['senha'];

        //redicionando o user
        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }
}
else{
    echo "<script> 

    let error = document.getElementById('error-msg-login');
    error.innerHTML = 'Email não encontrado!';
    setTimeout(() => {
        error.classList.add('slide');
    }, 250);
    setTimeout(() => {
        error.classList.remove('slide');
    }, 3250);
    
    
    </script>";
}
?>