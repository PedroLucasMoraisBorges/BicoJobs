<?php
/*
require_once ("../conection/logout.php");
require_once ("../functions/alterar_tipo.php");
require_once ("../functions/cadastro.php");
require_once ("../functions/login.php");
*/


class User{
    private $id;
    private $email;
    private $telefone;
    private $idioma;
    private $cep;
    private $dt_nascimento;
    private $habilidades;
    private $cpf;
    private $tipo_usuario;
    private $descricao;
    private $avaliacao;
    private $nome;
    private $senha;
    private $img_perfil;

    public function __construct($nome, $dt_nascimento, $cpf, $cep, $senha, $tipo_usuario, $email)
    {
        $this->nome = $nome;
        $this->dt_nascimento = $dt_nascimento;
        $this->cpf = $cpf;
        $this->cep = $cep;
        $this->senha = $senha;
        $this->tipo_usuario = $tipo_usuario;
        $this->email = $email;
    }


    public function getIdCidade($mysqli){
        $sql_code = "SELECT id_cidade FROM usuario WHERE id = $this->id";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        $id_cidade = $sql_query->fetch_assoc();

        return $id_cidade['id'];
    }

    public function setIdCidade($sql_codes, $mysqli){
        // Verifica se tem a cidade no banco
        $sql_code_mesmo_cep = "SELECT id FROM cidade WHERE cep = $this->cep";
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
            $sql = "INSERT INTO cidade (id, cep) VALUES ($last_id, $this->cep)";
            $sql_codes[] = $sql;
            //(mysqli_query($mysqli, $sql));
            return $this->cep = $last_id;
        }
        else{
            return $this->cep = $row["id"];
        }
    }



    public function setIdEmail($sql_codes, $mysqli){
        $sql_code = "SELECT id FROM contato WHERE email = '$this->email'";
        $sql_code_last_id = "SELECT id FROM contato";


        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);
        $row = $sql_query->fetch_assoc();

        $sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
        $last_id = $sql_query_last_id->num_rows;


        if($sql_query->num_rows <= 0){
            if($sql_query_last_id->num_rows <=0){
                $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$this->email')";
                $sql_codes[] = $sql;
                //(mysqli_query($mysqli, $sql));
                return $email = $last_id;
            }
            else{
                $sql = "INSERT INTO contato (id, contato) VALUES ($last_id, '$this->email')";
                $sql_codes[] = $sql;
                //(mysqli_query($mysqli, $sql));
                return $email = $last_id;
            }
        }
        else{
            die("O email já está cadastrado");
        }
    }
}