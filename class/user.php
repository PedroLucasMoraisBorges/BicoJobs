<?php
require_once ("../conection/conection.php");


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

    public function __construct($mysqli, $nome, $dt_nascimento, $cpf, $cep, $senha, $tipo_usuario, $email,$log_cad)
    {

        if($log_cad == 0){
            // Verifica se tem cpf no banco
            $sql_code = "SELECT id FROM usuario WHERE cpf = '$cpf'";

            $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

            if($sql_query->num_rows == 1){
                die("O cpf já está cadastrado <a href='javascript:history.back()'>Retornar</a>");
            }


            // Verifica se tem usuario no banco
            $sql_code = "SELECT id FROM usuario WHERE nome = '$nome'";

            $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

            if($sql_query->num_rows == 1){
                die("O nome de usuario já está cadastrado <a href='javascript:history.back()'>Retornar</a>");
            }

            $this->nome = $nome;
            $this->dt_nascimento = $dt_nascimento;
            $this->cpf = $cpf;
            $this->cep = $cep;
            $this->senha = $senha;
            $this->tipo_usuario = $tipo_usuario;
            $this->email = $email;
        }
        else{
            $this->nome = $nome;
            $this->dt_nascimento = $dt_nascimento;
            $this->cpf = $cpf;
            $this->cep = $cep;
            $this->senha = $senha;
            $this->tipo_usuario = $tipo_usuario;
        }
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
        // Retorna a chave do array
        $row = $sql_query->fetch_assoc();

        // Verifica se é possível efetuar o código ou da erro;
        $sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
        // Verifica a qauntidade de lihas afetadas;
        $last_id = $sql_query_last_id->num_rows;


        if($sql_query->num_rows <= 0){
            $sql = "INSERT INTO cidade (id, cep) VALUES ($last_id, $this->cep)";
            $sql_codes[] = $sql;
            //(mysqli_query($mysqli, $sql));
            $this->cep = $last_id;
            return [$this->cep, $sql_codes];
        }
        else{
            $this->cep = $row["id"];
            return [$this->cep , $sql_codes];
        }
    }



    public function getEmail($mysqli){
        $sql_code = "SELECT id_contato FROM usuario WHERE id = $this->id";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        $id_contato = $sql_query->fetch_assoc();
        $id_contato = $id_contato['id'];

        $sql_code = "SELECT email FROM contato WHERE id = $id_contato";
        $sql_query = $mysqli->qery($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);
        $email = $sql_query->fetch_assoc();

        return $email['email'];
    }
    public function setIdEmail($sql_codes, $mysqli){
        $sql_code = "SELECT id FROM contato WHERE email = '$this->email'";
        $sql_code_last_id = "SELECT id FROM contato";


        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);
        $row = $sql_query->fetch_assoc();

        $sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
        $last_id = $sql_query_last_id->num_rows;


        if($sql_query->num_rows <= 0){
            $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$this->email')";
            $sql_codes[] = $sql;
            //(mysqli_query($mysqli, $sql));
            $this->email = $last_id;
            return [$this->email , $sql_codes];
        }
        else{
            die("O email já está cadastrado");
        }
    }


    public function sign_in($sql_codes,$last_id ,$nome, $cpf, $pass, $cep, $email,$mysqli,$dt_nasci){
        $sql_code = "SELECT id, nome FROM usuario";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);


        if($sql_query->num_rows <= 0){

            if(count($sql_codes) !=3){
                for($i=0 ; $i<count($sql_codes) ; $i++){
                    (mysqli_query($mysqli, $sql_codes[$i]));
                }
            
                $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento ) VALUES (0 ,'$nome', '$cpf', '$pass', $cep, $email, 0,'$dt_nasci' )";
            
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
                $_SESSION["cpf"] = $user["cpf"];
                $_SESSION["cep"] = $user['id_cidade'];
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
            
                $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento) VALUES ($last_id ,'$nome', '$cpf', '$pass', $cep, $email, 0,'$dt_nasci')";
            
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
                $_SESSION["cpf"] = $user["cpf"];
                $_SESSION["cep"] = $user['id_cidade'];
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

                //redicionando o user
                header("Location: http://localhost/BicoJobs/templates/servicos.php");
            }
        }
    }



    public function alterar_tipo($id,$mysqli,$img_perfil,$descricao,$habilidade,$idioma,$telefone,$nome_comp){

        $sql = "SELECT id FROM idioma WHERE id = $id";
        $sql_query = $mysqli->query($sql);
        if($sql_query->num_rows <=0){
            $id_idioma = 0;
        }
        else{
            $id_idioma = $sql_query->fetch_assoc();
            $id_idioma = $id_idioma['id'];
        }

        // IDIOMA 
        $sql_code = "SELECT id FROM idioma";
        $sql_query = $mysqli->query($sql_code);

        $sql = "INSERT INTO idioma (id, idioma) VALUES ($sql_query->num_rows , '$idioma')";
        $sql_query = $mysqli->query($sql);
        // IDIOMA


        // INCREMENTO NO PERFIL DE USUARIO
        $sql = "UPDATE usuario SET tipo_usuario= 1, img_perfil= '$img_perfil',descricao= '$descricao', habilidades= '$habilidade' , id_idioma= $id_idioma,  avaliacao= 5.0, nome_comp= '$nome_comp' WHERE id = $id";
        $sql_query = $mysqli->query($sql);

        $sql = "UPDATE contato SET telefone='$telefone' WHERE id = $id";
        $sql_query = $mysqli->query($sql);
        // INCREMENTO NO PERFIL DE USUARIO


        $sql = "SELECT * FROM usuario WHERE id = '$id'";
        $sql_query = $mysqli->query($sql);
        $user = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['avaliacao'] = $user['avaliacao'];
        $_SESSION['tipo_user'] = $user['tipo_usuario'];
        $_SESSION['id_idioma'] = $user['id_idioma'];
        $_SESSION['descricao'] = $user['descricao'];
        $_SESSION['img_perfil'] = $user['img_perfil'];
        $_SESSION['habilidades'] = $user['habilidades'];
        $_SESSION['nome_comp'] = $user['nome_comp'];

        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }


    public function retornar_info($mysqli,$id_idioma, $id_contato){
        $sql_code = "SELECT idioma FROM idioma WHERE id = $id_idioma";
        $sql_query = $mysqli->query($sql_code);
        $idioma = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
            session_start();
        }

        if($sql_query->num_rows == 0){
            $_SESSION['idioma'] = "Você não cadastrou nenhum idioma";
        }
        else{
            $_SESSION['idioma'] = $idioma['idioma'];
        }

        $sql_code = "SELECT email, telefone FROM contato WHERE id = $id_contato";
        $sql_query = $mysqli->query($sql_code);
        $contatos = $sql_query->fetch_assoc();

        $_SESSION['email'] = $contatos['email'];
        $_SESSION['telefone'] = $contatos['telefone'];

    }
}