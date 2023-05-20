<?php
include("../conection/conection.php");
require_once ("../class/user.php");
require_once("../templates/logcad.php");

//require_once("../class/user.php");

$email = $_POST['user_log'];
$senha = $_POST['password_log'];


$sql_code_contato = "SELECT id FROM contato WHERE email = '$email'";


$sql_query = $mysqli->query($sql_code_contato);
$row = $sql_query->fetch(PDO::FETCH_ASSOC);

if($sql_query->rowCount() == 1){
    $email = $row["id"];
    $sql = "SELECT * FROM usuario WHERE id_contato = '$email' AND senha = '$senha'";
    $sql_qery = $mysqli->query($sql);

    $user = $sql_qery->fetch(PDO::FETCH_ASSOC)();

    if($sql_qery -> rowCount() == 0){
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
        $nome_cidade = $sql_query->fetch(PDO::FETCH_ASSOC);

        $_SESSION = $user;
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
