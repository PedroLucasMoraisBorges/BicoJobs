<?php
namespace Pi\Bicojobs\Model;

use PDO;

require "../autoload.php";


class Verificacoes{
    // EMAIL
    public function verificaEmail($pdo, $email, $id_usuario) : int
    {
        $sql = "SELECT email FROM contato WHERE email = '$email' AND id != $id_usuario";
        $row = ($pdo -> query($sql)) -> rowCount();
        return $row;
    }



    public function verificaEmailCad($pdo, $email) : int
    {   
        $sql = "SELECT email FROM contato WHERE email = '$email'";
        $row = ($pdo->query($sql)) -> rowCount();

        return $row;
    }


    public function verificaCpf($pdo, $cpf){
        $sql = "SELECT cpf FROM usuario WHERE cpf = '$cpf'";
        $row = ($pdo->query($sql)) -> rowCount();


        return $row;
    }


    public function verificaEmailLog($pdo, $email)
    {
        $sql = "SELECT id FROM contato WHERE email = '$email'";
        $row = $pdo->query($sql);
        
        if($row->rowCount() == 0){
            return "null";
        }
        else{
            return ($row->fetch(PDO::FETCH_ASSOC))['id'];
        }
    }





    public function verificaEmailSenha($pdo, $id_contato, $senha)
    {
        $sql = "SELECT * FROM usuario WHERE id_contato = '$id_contato' AND senha = '$senha'";
        $sql_query = $pdo->query($sql);

        if($sql_query -> rowCount() == 1){
            return $sql_query->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return "null";
        }
    }



    public function verificaTel($pdo, $tel, $id_usuario) : int
    {
        $sql = "SELECT telefone FROM contato WHERE telefone = '$tel' AND id != $id_usuario";
        $row = ($pdo -> query($sql)) -> rowCount();
        
        return $row;
    }


    public function error($mensagem){
        echo "<script> 
        let error = document.getElementById('error-msg-login');
        error.innerHTML = '".$mensagem."';
        setTimeout(() => {
            error.classList.add('slide');
        }, 250);
        setTimeout(() => {
        error.classList.remove('slide');
        }, 3250);
        </script>";
    }
}