<?php
include("../conection/conection.php");

$caminho = 'http://localhost/BicoJobs';


//Cria as variáveis, puxando do form no template
$nome = $_POST['user_cad'];
$cpf = $_POST['cpf'];
$dt_nasci = $_POST['dtNasci'];
$pass = $_POST['password_cad'];
$pass1 = $_POST['password2'];
$cep = $_POST['cep'];
$email = $_POST['email_cad'];
$sql_codes = [];




/*===================================================================================================================*/



// Verifica se tem a cidade no banco
$sql_code_mesmo_cep = "SELECT id FROM cidade WHERE cep = $cep";
$sql_code_last_id = "SELECT id FROM cidade";

// Verifica se é possível efetuar o código ou da erro;
$sql_query = $mysqli->query($sql_code_mesmo_cep) or die("Falha na execuça do código SQL" .$mysqli->error);
// Verifica a qauntidade de lihas afetadas;
$row = $sql_query->fetch_assoc();

// Verifica se é possível efetuar o código ou da erro;
$sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
// Verifica a qauntidade de lihas afetadas;
$last_id = $sql_query_last_id->num_rows;


if($sql_query->num_rows <= 0){
    $sql = "INSERT INTO cidade (id, cep) VALUES ($last_id, $cep)";
    $sql_codes[] = $sql;
    //(mysqli_query($mysqli, $sql));
    $cep = $last_id;
}
else{
    $cep = $row["id"];
}

/*===================================================================================================================*/



// Verifica se tem contato no banco
$sql_code_contato = "SELECT id FROM contato WHERE email = '$email'";
$sql_code_last_id = "SELECT id FROM contato";


$sql_query = $mysqli->query($sql_code_contato) or die("Falha na execuça do código SQL" .$mysqli->error);
$row = $sql_query->fetch_assoc();

$sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
$last_id = $sql_query_last_id->num_rows;


if($sql_query->num_rows <= 0){
    if($sql_query_last_id->num_rows <=0){
        $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$email')";
        $sql_codes[] = $sql;
        //(mysqli_query($mysqli, $sql));
        $email = $last_id;
    }
    else{
        $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$email')";
        $sql_codes[] = $sql;
        //(mysqli_query($mysqli, $sql));
        $email = $last_id;
    }
}
else{
    die("O email já está cadastrado <a href='javascript:history.back()'>Retornar</a>");
}

/*===================================================================================================================*/



// Verifica se tem cpf no banco
$sql_code_cpf = "SELECT id FROM usuario WHERE cpf = '$cpf'";
$sql_code_last_id = "SELECT id FROM usuario";


$sql_query = $mysqli->query($sql_code_cpf) or die("Falha na execuça do código SQL" .$mysqli->error);
$row = $sql_query->fetch_assoc();

$sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
$last_id = $sql_query_last_id->num_rows;


if($sql_query->num_rows == 1){
    die("O cpf já está cadastrado <a href='javascript:history.back()'>Retornar</a>");
}


/*===================================================================================================================*/


// Verifica se tem usuario no banco
$sql_code_cpf = "SELECT id FROM usuario WHERE nome = '$nome'";
$sql_code_last_id = "SELECT id FROM usuario";


$sql_query = $mysqli->query($sql_code_cpf) or die("Falha na execuça do código SQL" .$mysqli->error);
$row = $sql_query->fetch_assoc();

if($sql_query->num_rows == 1){
    die("O nome de usuario já está cadastrado <a href='javascript:history.back()'>Retornar</a>");
}


/*===================================================================================================================*/

$sql_code = "SELECT id, nome FROM usuario";
$sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);



if($sql_query->num_rows <= 0){

    if(count($sql_codes) !=3){
        for($i=0 ; $i<count($sql_codes) ; $i++){
            (mysqli_query($mysqli, $sql_codes[$i]));
        }
    
        $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario ) VALUES (0 ,'$nome', '$cpf', '$pass', $cep, $email, 0)";
    
        $mysqli->query($sql);


        $sql_code = "SELECT id, nome FROM usuario";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        //fazendo login
        $user = $sql_query->fetch_assoc();
        // start da sessao
        session_start();

        //Criado a sessao do USER
        $_SESSION["id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"];
        $_SESSION["cep"] = $user['cep'];
        $_SESSION['id_contato'] = $user['id_contato'];
        $_SESSION['tipo_user'] = $user['tipo_usuario'];
        $_SESSION['senha'] = $user['senha'];

        //redicionando o user
        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }
}
else{
    $last_id = $sql_query->num_rows;
    if(count($sql_codes) !=3){
        for($i=0 ; $i<count($sql_codes) ; $i++){
            (mysqli_query($mysqli, $sql_codes[$i]));
        }
    
        $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario ) VALUES ($last_id ,'$nome', '$cpf', '$pass', $cep, $email, 0)";
    
        ($mysqli->query($sql));

        $sql_code = "SELECT id, nome FROM usuario WHERE nome = '$nome'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);


        //fazendo login
        $user = $sql_query->fetch_assoc();
        // start da sessao
        
        if(!isset($_SESSION)){
            session_start();
        }

        //Criado a sessao do USER
        $_SESSION["id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"];
        $_SESSION["cep"] = $user['cep'];
        $_SESSION['id_contato'] = $user['id_contato'];
        $_SESSION['tipo_user'] = $user['tipo_usuario'];
        $_SESSION['senha'] = $user['senha'];

        //redicionando o user
        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }
}