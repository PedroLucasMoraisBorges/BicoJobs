<?php
namespace Pi\Bicojobs\Model;
require "../autoload.php";

use PDO;
class User implements AutenticarUser{
    private  $id;
    private  $email;
    private  $telefone;
    private  $idioma;
    private  $cep;
    private  $dt_nascimento;
    private  $habilidades;
    private  $cpf;
    private  $tipo_usuario;
    private  $descricao;
    private  $avaliacao;
    private  $nome;
    private  $senha;
    private  $img_perfil;
    private  $id_contato;
    private  static $numUsuarios = 0;

    // COMPORTAMENTOS(CONSTRUTOR , GET/SET , MÉTODOS EXPECÍFICOS)

    // CONSTRUTOR 
    public function __construct($id, $nome, $dt_nascimento, $cpf, $cep, $senha, $tipo_usuario, $email)
    {
        $this -> id = $id;
        $this -> nome = $nome;
        $this -> dt_nascimento = $dt_nascimento;
        $this -> cpf = $cpf;
        $this -> cep = $cep;
        $this -> senha = $senha;
        $this -> tipo_usuario = $tipo_usuario;
        $this -> email = $email;
        self::$numUsuarios++;
    }

    // DESTRUTOR (SERVE PARA, QUANDO UM OBJETO FOR APAGADO, EFETUAR ALTERAÇÕES NA CLASE) 
    public function __destruct()
    {
        self::$numUsuarios--;
    }


    public function setNome($pdo, $nome) : void{
        $pdo->query("UPDATE usuario SET nome = '$nome'");
    }

    public function setDescricao($pdo, $descricao) : void
    {
        $pdo->query("UPDATE usuario SET descricao = '$descricao'");
    }

    public function setNomeComp($pdo, $nome_comp) : void
    {
        $pdo->query("UPDATE usuario SET nome_comp = '$nome_comp'");
    }

    public function setHabilidades($pdo, $habilidade) : void
    {
        $pdo->query("UPDATE usuario SET habilidades = '$habilidade'");
    }

    public function setImgPerfil($pdo, $img_perfil) : void
    {
        $pdo->query("UPDATE usuario SET img_perfil = '$img_perfil'");
    }

    public function setIdioma($pdo, $idioma) : int
    {
        // Alteração ou adição de idioma
        $sql_code = "SELECT id FROM idioma WHERE idioma = '$idioma'";
        $sql_query = $pdo->query($sql_code);
        $count = $sql_query->rowCount();

        $sql_code = "SELECT id FROM idioma";
        $sql_query_id = $pdo->query($sql_code);
        $countid = $sql_query_id->rowCount();

        if($count == 0){
            $sql_code = "INSERT INTO idioma (id,idioma) VALUES ($countid, '$idioma')";
            $sql_query = $pdo->query($sql_code);
            $id_idioma = $sql_query_id->rowCount();
        }
        else{
            $id_idioma = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];
        }

        $sql = "UPDATE usuario SET id_idioma = '$id_idioma'";
        $sql_query = $pdo->query($sql);

        return $id_idioma;
        // Alteração ou adição de idioma
    }


    public function setCidade($pdo, $cep) : void
    {

        $url =  "https://viacep.com.br/ws/$cep/json/";
        $address = json_decode(file_get_contents($url),true);
        $cep = $address['localidade'];
        
        $sql_code = "SELECT id FROM cidade WHERE cep = '$cep'";
        $sql_query = $pdo->query($sql_code);
        $rows = $sql_query -> rowCount();


        $sql_code = "SELECT id FROM cidade";
        $sql_query_id = $pdo->query($sql_code);
        $row_id = $sql_query_id -> rowCount();

        if($rows == 0){
            $sql_code = "INSERT INTO cidade (id,cep) VALUES ($row_id, '$cep')";
            $sql_query = $pdo->query($sql_code);
            $id_cidade = $row_id;
        }
        else{
            $id_cidade = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];
        }

        $sql_code = "UPDATE usuario SET id_cidade= $id_cidade WHERE id = $this->id";

        $sql_query = $pdo->query($sql_code);
        
    }
    public function setEmail($pdo, $email, $id_contato) : void{
        // Alteração ou cancelamento de email
        $sql_code = "SELECT id FROM contato WHERE email = '$email'";
        $sql_query = $pdo->query($sql_code);

        // Verifica se o email já é cadastrado no BD
        if($sql_query->rowCount() == 0){
            // Altera o valor da coluna
            $pdo->query("UPDATE contato SET email= '$email' WHERE id = '$id_contato'");
        }
        else{
            $sql_code = "SELECT * FROM contato WHERE id = '$id_contato'";
            $sql_query = $pdo->query($sql_code);
            $sql_query = $sql_query->fetch(PDO::FETCH_ASSOC);


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
    }



    public function setTelefone($pdo, $telefone, $id_contato){
        // Alteração ou cancelamento de telefone
        $sql_code = "SELECT id FROM contato WHERE telefone = '$telefone'";
        $sql_query = $pdo->query($sql_code);
        

        // Verifica se o email já é cadastrado no BD
        if($sql_query->rowCount() == 0){
            // Altera o valor da coluna
            $id_contato = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];
            $sql_query = $pdo->query("UPDATE contato SET telefone= '$telefone' WHERE id = '$id_contato'");
        }
        else{
            $sql_code = "SELECT telefone FROM contato WHERE id = $id_contato";
            $sql_query = $pdo->query($sql_code);
            $sql_query = $sql_query->fetch(PDO::FETCH_ASSOC);

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
    }

    // GET E SET
    public function getIdCidade($mysqli) : int
    {
        $sql_code = "SELECT id_cidade FROM usuario WHERE id = $this->id";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        $id_cidade = $sql_query->fetch(PDO::FETCH_ASSOC);

        return $id_cidade['id_cidade'];
    }
    public function setIdCidade($sql_codes, $mysqli) : array
    {
        // Verifica se tem a cidade no banco
        $sql_code_mesmo_cep = "SELECT id FROM cidade WHERE cep = '$this->cep'";
        $sql_code_last_id = "SELECT id FROM cidade";

        // Verifica se é possível efetuar o código ou da erro;
        $sql_query = $mysqli->query($sql_code_mesmo_cep) or die("Falha na execuça do código SQL" .$mysqli->error);
        // Retorna a chave do array
        $row = $sql_query->fetch(PDO::FETCH_ASSOC);

        // Verifica se é possível efetuar o código ou da erro;
        $sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
        // Verifica a qauntidade de lihas afetadas;
        $last_id = $sql_query_last_id->rowCount();


        if($sql_query->rowCount() <= 0){
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



    public function getEmail($mysqli) : string
    {
        $sql_code = "SELECT id_contato FROM usuario WHERE id = $this->id";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        $id_contato = $sql_query->fetch(PDO::FETCH_ASSOC);
        $id_contato = $id_contato['id'];

        $sql_code = "SELECT email FROM contato WHERE id = $id_contato";
        $sql_query = $mysqli->qery($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);
        $email = $sql_query->fetch(PDO::FETCH_ASSOC);

        return $email['email'];
    }
    public function setIdEmail($sql_codes, $mysqli) : array
    {
        $sql_code = "SELECT id FROM contato WHERE email = '$this->email'";
        $sql_code_last_id = "SELECT id FROM contato";

        $sql_query = $mysqli->query($sql_code) or die("Falha na execuça do código SQL" .$mysqli->error);

        $sql_query_last_id = $mysqli->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$mysqli->error);
        $last_id = $sql_query_last_id->rowCount();


        if($sql_query->rowCount() <= 0){
            $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$this->email')";
            $sql_codes[] = $sql;
            $this->id_contato = $last_id;
            return $sql_codes;
        }
        else{
            die("Email já cadastrado");
        }
    }

    public static function getNumUsuarios() : int 
    {
        return self::$numUsuarios;
    }

    // MÉTODOS ESPECÍFICOS

    public function login($pdo,$email, $senha) : void
    {
        $sql_code_contato = "SELECT id FROM contato WHERE email = '$email'";


        $sql_query = $pdo->query($sql_code_contato);
        $row = $sql_query->fetch(PDO::FETCH_ASSOC);

        if($sql_query->rowCount() == 1){
            $email = $row["id"];
            $sql = "SELECT * FROM usuario WHERE id_contato = '$email' AND senha = '$senha'";
            $sql_qery = $pdo->query($sql);

            $user = $sql_qery->fetch(PDO::FETCH_ASSOC);

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
                $sql_query = $pdo->query($sql);
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
    }


    public function sign_in($sql_codes, $pdo) : void
    {
        // Verifica se tem cpf no banco
        $sql_code = "SELECT id FROM usuario WHERE cpf = '$this->cpf'";

        $sql_query = $pdo->query($sql_code) or die("Falha na execuça do código SQL" .$pdo->error);

        if($sql_query->rowCount() == 1){
            die("O cpf já está cadastrado <a href='javascript:history.back()'>Retornar</a>");
        }
    
        $sql_code = "SELECT * FROM usuario";
        $sql_query = $pdo->query($sql_code) or die("Falha na execuça do código SQL" .$pdo->error);

        if($sql_query->rowCount() <= 0){
            for($i=0 ; $i<count($sql_codes) ; $i++){
                $pdo->query($sql_codes[$i]);
            }

            // Recebe o nome da cidade
            $sql = "SELECT cep FROM cidade WHERE id = $this->cep";
            $sql_query = $pdo->query($sql);
            $nome_cidade = $sql_query->fetch(PDO::FETCH_ASSOC);
        
            // Cria um novo usuario no banco de dados
            $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento ) VALUES (0 ,'$this->nome', '$this->cpf', '$this->senha', $this->cep, $this->id_contato, 0,'$this->dt_nascimento' )";
            
            $pdo->query($sql);

            $sql_code = "SELECT * FROM usuario WHERE cpf = '$this->cpf'";
            $sql_query = $pdo->query($sql_code) or die("Falha na execuça do código SQL" .$pdo->error);

            //fazendo login
            $user = $sql_query->fetch(PDO::FETCH_ASSOC);
            // start da sessao
            session_start();

            //Criado a sessao do USER
            $_SESSION = $user;
            $_SESSION['cidade'] = $nome_cidade['cep'];

            //redicionando o user
            header("Location: http://localhost/BicoJobs/templates/servicos.php");
            
        }
        else{
            $last_id = $sql_query->rowCount();
            for($i=0 ; $i<count($sql_codes) ; $i++){
                ($pdo->query($sql_codes[$i]));
            }
        
            $sql = "SELECT cep FROM cidade WHERE id = $this->cep";
            $sql_query = $pdo->query($sql);
            $nome_cidade = $sql_query->fetch(PDO::FETCH_ASSOC);

            // Cria um novo usuario no banco de dados
            $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento) VALUES ($last_id ,'$this->nome', '$this->cpf', '$this->senha', $this->cep, $this->id_contato , 0,'$this->dt_nascimento')";
        
            ($pdo->query($sql));

            $sql_code = "SELECT * FROM usuario WHERE cpf = '$this->cpf'";
            $sql_query = $pdo->query($sql_code) or die("Falha na execuça do código SQL" .$pdo->error);


            //fazendo login
            $user = $sql_query->fetch(PDO::FETCH_ASSOC);
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



    public function alterar_tipo($id,$pdo,$img_perfil,$descricao,$habilidade,$idioma,$telefone,$nome_comp, $usuario) : void
    {
        $id_contato = $pdo->query("SELECT id_contato FROM usuario WHERE id = $this->id");
        $id_contato = $id_contato->fetch(PDO::FETCH_ASSOC);
        $id_contato = $id_contato['id_contato'];
        // IDIOMA 
        $usuario -> setIdioma($pdo, $idioma);
        // IDIOMA

        $usuario -> setHabilidades($pdo, $habilidade);

        $usuario -> setImgPerfil($pdo, $img_perfil);

        $usuario -> setNomeComp($pdo, $nome_comp);

        $usuario -> setDescricao($pdo, $descricao);

        $usuario -> setTelefone($pdo, $telefone,$id_contato);

        // INCREMENTO NO PERFIL DE USUARIO
        $sql = "UPDATE usuario SET tipo_usuario= 1 WHERE id = $id";
        $sql_query = $pdo->query($sql);    
        // INCREMENTO NO PERFIL DE USUARIO


        $sql = "SELECT * FROM usuario WHERE id = '$id'";
        $sql_query = $pdo->query($sql);
        $user = $sql_query->fetch(PDO::FETCH_ASSOC);

        if(!isset($_SESSION)){
            session_reset();
        }

        $_SESSION = $user;

        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }


    public function retornar_info($mysqli,$id_idioma, $id_contato, $id_cep, $id) : void
    {
        if($this -> tipo_usuario == 1){
            $sql_code = "SELECT idioma FROM idioma WHERE id = $id_idioma";
            $sql_query = $mysqli->query($sql_code);

            $idioma = $sql_query->fetch(PDO::FETCH_ASSOC);

            if(!isset($_SESSION)){
                session_start();
            }

            if($sql_query->rowCount() == 0){
                $_SESSION['idioma'] = "Você não cadastrou nenhum idioma";
            }
            else{
                $_SESSION['idioma'] = $idioma['idioma'];
            }

            $sql_code = "SELECT email, telefone FROM contato WHERE id = '$id_contato'";
            $sql_query = $mysqli->query($sql_code);
            $contatos = $sql_query->fetch(PDO::FETCH_ASSOC);

            $sql_code = "SELECT cep FROM cidade WHERE id = '$id_cep'";
            $sql_query = $mysqli->query($sql_code);
            $cep = $sql_query->fetch(PDO::FETCH_ASSOC);


            $sql = "SELECT notas FROM notas WHERE id_usuario = '$id'";
            $result = $mysqli->query($sql);
            $avaliacao = 0;
            $n = 0;
            if($result->rowCount() == 0){
                $avaliacao = "Novo";
            }
            else{
                while($row = $result->feth(PDO::FETCH_ASSOC)){
                    $n += 1;
                    $avaliacao += $row['nota'];
                }
                $avaliacao = $avaliacao/=$n;
            }
            $_SESSION['email'] = $contatos['email'];
            $_SESSION['telefone'] = $contatos['telefone'];
            $_SESSION['avaliacao'] = $avaliacao;
            $_SESSION['cidade'] = $cep['cep'];
            }
    }


    public function editar_perfil($pdo, $id, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep, $usuario) : void
    {
        // Pegar as chaves estrangeiras para efetuar edição
        $sql_code = "SELECT id_cidade, id_contato, id_idioma FROM usuario WHERE id = $id";
        $sql_query = $pdo->query($sql_code);
        $sql_query = $sql_query->fetch(PDO::FETCH_ASSOC);

        //$id_cidade = $sql_query['id_cidade'];
        $id_contato = $sql_query['id_contato'];
        $id_cidade = $sql_query['id_cidade'];
        $id_idioma = $sql_query['id_idioma'];
        // Pegar as chaves estrangeiras para efetuar edição


        $usuario -> setImgPerfil($pdo, $img_perfil);

        $usuario -> setHabilidades($pdo, $habilidade);

        $usuario -> setNome($pdo, $nome);

        $usuario -> setDescricao($pdo, $descricao);

        $usuario -> setNomeComp($pdo, $nome_comp);
        
        $usuario -> setIdioma($pdo, $idioma);
        
        $usuario -> setEmail($pdo, $email, $id_contato);

        $usuario -> setTelefone($pdo, $telefone, $id_contato);

        $usuario -> setCidade($pdo, $cep);

        
        session_reset();

        $sql_code = "SELECT * FROM usuario WHERE id = $id";
        $sql_query = $pdo->query($sql_code);
        $user = $sql_query->fetch(PDO::FETCH_ASSOC);

        $_SESSION = $user;
        $_SESSION['cidade'] = $cep;

        echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";
    }
}