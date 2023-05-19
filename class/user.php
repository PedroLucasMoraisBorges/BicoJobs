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
    private $id_contato;

    public function __construct($nome, $dt_nascimento, $cpf, $cep, $senha, $tipo_usuario, $email)
    {
 
        $this -> nome = $nome;
        $this -> dt_nascimento = $dt_nascimento;
        $this -> cpf = $cpf;
        $this -> cep = $cep;
        $this -> senha = $senha;
        $this -> tipo_usuario = $tipo_usuario;
        $this -> email = $email;
        
    }



    public function getIdCidade($mysqli){
        $sql_code = "SELECT id_cidade FROM usuario WHERE id = $this->id";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        $id_cidade = $sql_query->fetch_assoc();

        return $id_cidade['id_cidade'];
    }
    public function setIdCidade($sql_codes, $mysqli){
        // Verifica se tem a cidade no banco
        $sql_code_mesmo_cep = "SELECT id FROM cidade WHERE cep = '$this->cep'";
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
            $sql = "INSERT INTO cidade (id, cep) VALUES ($last_id, '$this->cep')";
            $sql_codes[] = $sql;
            //(mysqli_query($mysqli, $sql));
            $this->cep = $last_id;
            return $sql_codes;
        }
        else{
            $this->cep = $row["id"];
            return $sql_codes;
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

        $sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
        $last_id = $sql_query_last_id->num_rows;


        if($sql_query->num_rows <= 0){
            $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$this->email')";
            $sql_codes[] = $sql;
            //(mysqli_query($mysqli, $sql));
            $this->id_contato = $last_id;
            return $sql_codes;
        }
        else{
            die("Email já cadastrado");
        }
    }


    public function sign_in($sql_codes, $mysqli){
        // Verifica se tem cpf no banco
        $sql_code = "SELECT id FROM usuario WHERE cpf = '$this->cpf'";

        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        if($sql_query->num_rows == 1){
            die("O cpf já está cadastrado <a href='javascript:history.back()'>Retornar</a>");
        }
    
        $sql_code = "SELECT * FROM usuario";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        if($sql_query->num_rows <= 0){
            for($i=0 ; $i<count($sql_codes) ; $i++){
                $mysqli->query($sql_codes[$i]);
            }

            // Recebe o nome da cidade
            $sql = "SELECT cep FROM cidade WHERE id = $this->cep";
            $sql_query = $mysqli->query($sql);
            $nome_cidade = $sql_query->fetch_assoc();
        
            // Cria um novo usuario no banco de dados
            $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento ) VALUES (0 ,'$this->nome', '$this->cpf', '$this->senha', $this->cep, $this->id_contato, 0,'$this->dt_nascimento' )";
            
            $mysqli->query($sql);

            $sql_code = "SELECT * FROM usuario WHERE cpf = '$this->cpf'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

            //fazendo login
            $user = $sql_query->fetch_assoc();
            // start da sessao
            session_start();

            //Criado a sessao do USER
            $_SESSION = $user;
            $_SESSION['cidade'] = $nome_cidade['cep'];

            //redicionando o user
            header("Location: http://localhost/BicoJobs/templates/servicos.php");
            
        }
        else{
            $last_id = $sql_query->num_rows;
            for($i=0 ; $i<count($sql_codes) ; $i++){
                (mysqli_query($mysqli, $sql_codes[$i]));
            }
        
            $sql = "SELECT cep FROM cidade WHERE id = $this->cep";
            $sql_query = $mysqli->query($sql);
            $nome_cidade = $sql_query->fetch_assoc();

            // Cria um novo usuario no banco de dados
            $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento) VALUES ($last_id ,'$this->nome', '$this->cpf', '$this->senha', $this->cep, $this->id_contato , 0,'$this->dt_nascimento')";
        
            ($mysqli->query($sql));

            $sql_code = "SELECT * FROM usuario WHERE cpf = '$this->cpf'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);


            //fazendo login
            $user = $sql_query->fetch_assoc();
            // start da sessao
            
            if(!isset($_SESSION)){
                session_start();
            }

            //Criado a sessao do USER
            $_SESSION = $user;
            
            $_SESSION['cidade'] = $nome_cidade['cep'];

            //redicionando o user
            header("Location: http://localhost/BicoJobs/templates/servicos.php");
            
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
        $sql = "UPDATE usuario SET tipo_usuario= 1, img_perfil= '$img_perfil',descricao= '$descricao', habilidades= '$habilidade' , id_idioma= $id_idioma, nome_comp= '$nome_comp' WHERE id = $id";
        $sql_query = $mysqli->query($sql);

        $sql_code = "SELECT telefone FROM contato WHERE telefone = '$telefone'";
        $sql_query = $mysqli->query($sql_code);

        if($sql_query->num_rows <= 0){
            $sql = "UPDATE contato SET telefone='$telefone' WHERE id = $id";
            $sql_query = $mysqli->query($sql);
        }
        else{
            die("Telefone já cadastrado");
        }
        // INCREMENTO NO PERFIL DE USUARIO


        $sql = "SELECT * FROM usuario WHERE id = '$id'";
        $sql_query = $mysqli->query($sql);
        $user = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION = $user;

        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }


    public function retornar_info($mysqli,$id_idioma, $id_contato, $id_cep){
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

        $sql_code = "SELECT email, telefone FROM contato WHERE id = '$id_contato'";
        $sql_query = $mysqli->query($sql_code);
        $contatos = $sql_query->fetch_assoc();

        $sql_code = "SELECT cep FROM cidade WHERE id = '$id_cep'";
        $sql_query = $mysqli->query($sql_code);
        $cep = $sql_query->fetch_assoc();

        $_SESSION['email'] = $contatos['email'];
        $_SESSION['telefone'] = $contatos['telefone'];

        $_SESSION['cidade'] = $cep['cep'];

    }


    public function editar_perfil($mysqli, $id, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep){
        // Pegar as chaves estrangeiras para efetuar edição
        $sql_code = "SELECT id_cidade, id_contato, id_idioma FROM usuario WHERE id = $id";
        $sql_query = $mysqli->query($sql_code);
        $sql_query = $sql_query->fetch_assoc();

        //$id_cidade = $sql_query['id_cidade'];
        $id_contato = $sql_query['id_contato'];
        $id_idioma = $sql_query['id_idioma'];
        // Pegar as chaves estrangeiras para efetuar edição


        // Alteração ou adição de cidade
        if($cep == ""){
            $sql = "SELECT id_cidade FROM usuario WHERE id = $id";
            $result = $mysqli->query($sql);
            $id_cidade = ($result->fetch_assoc())['id_cidade'];

            $sql = "SELECT cep FROM cidade WHERE id = '$id_cidade";
            $result = $mysqli->query($sql);
            $cep = ($result->fetch_assoc())['cep'];
        }
        else{
            $url =  "https://viacep.com.br/ws/$cep/json/";
            $address = json_decode(file_get_contents($url),true);
            $cep = $address['localidade'];
        }
        $sql_code = "SELECT id FROM cidade WHERE cep = '$cep'";
        $sql_query = $mysqli->query($sql_code);

        $sql_code = "SELECT id FROM cidade";
        $sql_query_id = $mysqli->query($sql_code);

        if($sql_query->num_rows == 0){
            $sql_code = "INSERT INTO cidade (id,cep) VALUES ($sql_query_id->num_rows, '$cep')";
            $sql_query = $mysqli->query($sql_code);
            $id_cidade = $sql_query_id->num_rows;
        }
        else{
            $id_cidade = ($sql_query->fetch_assoc())['id'];
        }
        // Alteração ou adição de cidade




        // Alteração ou adição de idioma
        $sql_code = "SELECT id FROM idioma WHERE idioma = '$idioma'";
        $sql_query = $mysqli->query($sql_code);

        $sql_code = "SELECT id FROM idioma";
        $sql_query_id = $mysqli->query($sql_code);

        if($sql_query->num_rows == 0){
            $sql_code = "INSERT INTO idioma (id,idioma) VALUES ($sql_query_id->num_rows, '$idioma')";
            $sql_query = $mysqli->query($sql_code);
            $id_idioma = $sql_query_id->num_rows;
        }
        else{
            $id_idioma = ($sql_query->fetch_assoc())['id'];
        }
        // Alteração ou adição de idioma



        // Alteração ou cancelamento de email
        $sql_code = "SELECT id FROM contato WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code);

        // Verifica se o email já é cadastrado no BD
        if($sql_query->num_rows == 0){
            // Altera o valor da coluna
            $sql_code = "UPDATE contato SET email= '$email' WHERE id = '$id_contato'";
            $sql_query = $mysqli->query($sql_code);
        }
        else{
            $sql_code = "SELECT email FROM contato WHERE id = '$id_contato'";
            $sql_query = $mysqli->query($sql_code);
            $sql_query = $sql_query->fetch_assoc();

            // Verifica se o email cadastrado no banco já pertence ao usuário
            if($sql_query['email'] != $email){
                echo "<script> 
                let error = document.getElementById('error-msg-login');
                error.innerHTML = 'Email Já cadastrado';
                setTimeout(() => {
                    error.classList.add('slide');
                }, 250);
                setTimeout(() => {
                error.classList.remove('slide');
                }, 3250);
                </script>";
            }
        }
        // Alteração ou cancelamento de email


        // Alteração ou cancelamento de telefone
        $sql_code = "SELECT id FROM contato WHERE telefone = '$telefone'";
        $sql_query = $mysqli->query($sql_code);

        // Verifica se o email já é cadastrado no BD
        if($sql_query->num_rows == 0){
            // Altera o valor da coluna
            $sql_code = "UPDATE contato SET telefone= '$telefone' WHERE id = '$id_contato'";
            $sql_query = $mysqli->query($sql_code);
        }
        else{
            $sql_code = "SELECT telefone FROM contato WHERE id = $id_contato";
            $sql_query = $mysqli->query($sql_code);
            $sql_query = $sql_query->fetch_assoc();

            // Verifica se o email cadastrado no banco já pertence ao usuário
            if($sql_query['telefone'] != $telefone){
                echo "<script> 
                let error = document.getElementById('error-msg-login');
                error.innerHTML = 'Telefone Já cadastrado';
                setTimeout(() => {
                    error.classList.add('slide');
                }, 250);
                setTimeout(() => {
                error.classList.remove('slide');
                }, 3250);
                </script>";
            }
        }


        $sql_code = "UPDATE usuario SET nome= '$nome', id_cidade= $id_cidade , nome_comp= '$nome_comp' , habilidades= '$habilidade', descricao= '$descricao', id_idioma= $id_idioma , img_perfil= '$img_perfil' WHERE id = $id";

        $sql_query = $mysqli->query($sql_code);

        session_reset();

        $sql_code = "SELECT * FROM usuario WHERE id = $id";
        $sql_query = $mysqli->query($sql_code);
        $user = $sql_query->fetch_assoc();

        $_SESSION = $user;
        $_SESSION['cidade'] = $cep;


    }
}