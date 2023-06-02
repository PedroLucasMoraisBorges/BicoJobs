<?php
namespace Pi\Bicojobs\Model;
require "../autoload.php";

use PDO;
class User{
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

    public function getUsuario($pdo){
        $sql = "SELECT * FROM usuario WHERE id = '$this->id'";
        $usuario = ($pdo->query($sql))->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getCidade($pdo){
        $sql = "SELECT cid.cep FROM cidade cid join usuario usu on cid.id = usu.id_cidade WHERE usu.id = '$this->id'";
        $cidade = ($pdo->query($sql))->fetch(PDO::FETCH_ASSOC);

        return $cidade['cep'];
    }


    public function getContatos($pdo){
        $sql = "SELECT con.email, con.telefone FROM contato con join usuario usu on con.id = usu.id_contato WHERE usu.id = '$this->id'";
        $contatos = ($pdo->query($sql))->fetch(PDO::FETCH_ASSOC);

        return $contatos;
    }


    public function getIdioma($pdo){
        $sql = "SELECT idi.idioma FROM idioma idi join usuario usu on idi.id = usu.id_idioma WHERE usu.id = '$this->id'";
        $idioma = ($pdo->query($sql))->fetch(PDO::FETCH_ASSOC);

        return $idioma['idioma'];
    }

    public function getNotas($pdo){
        $sql = "SELECT nota.notas FROM notas nota join usuario usu on nota.id_usuario = usu.id WHERE usu.id = '$this->id'";
        $result = $pdo->query($sql);
        $nota = 0;
        $n = 0;
        if($result->rowCount() == 0){
            $nota = "Novo";
        }
        else{
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $n += 1;
                $nota += $row['notas'];
            }
            $nota = $nota/=$n;
        }

        return $nota;
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
        $pdo->query("UPDATE contato SET email= '$email' WHERE id = '$id_contato'");
    }

    public function setTelefone($pdo, $telefone, $id_contato){
        $sql_query = $pdo->query("UPDATE contato SET telefone= '$telefone' WHERE id = '$id_contato'");
    }

    public function setIdCidade($pdo)
    {
        // Verifica se tem a cidade no banco
        $sql_code = "SELECT id FROM cidade WHERE cep = '$this->cep'";
        $sql_last_id = "SELECT id FROM cidade";

        // Verifica se é possível efetuar o código ou da erro;
        $sql_query = $pdo->query($sql_code);
        // Retorna a chave do array
        $row = $sql_query->fetch(PDO::FETCH_ASSOC);

        // Verifica se é possível efetuar o código ou da erro;
        $sql_query_last_id = $pdo->query($sql_last_id);
        // Verifica a qauntidade de lihas afetadas;
        $last_id = $sql_query_last_id->rowCount();


        if($sql_query->rowCount() <= 0){
            $sql = "INSERT INTO cidade (id, cep) VALUES ($last_id, '$this->cep')";
            $pdo->query($sql);
            $this->cep = $last_id;
        }
        else{
            $this->cep = $row["id"];
        }
    }

    public function setIdEmail($pdo)
    {
        $sql_code_last_id = "SELECT id FROM contato";
        $sql_query_last_id = $pdo->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$pdo->error);

        $last_id = $sql_query_last_id->rowCount();

        $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$this->email')";
        $pdo->query($sql);
        $this->id_contato = $last_id;
    }

    public static function getNumUsuarios() : int 
    {
        return self::$numUsuarios;
    }

    // MÉTODOS ESPECÍFICOS

    public function login($pdo,$user) : void
    {
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION = $user;

        //redicionando o user
        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }


    public function sign_in($sql_codes, $pdo) : void
    {
        $sql_code = "SELECT * FROM usuario";
        $sql_query = $pdo->query($sql_code) or die("Falha na execuça do código SQL" .$pdo->error);

        $this->setIdEmail($pdo);
        $this->setIdCidade($pdo);

        if($sql_query->rowCount() <= 0){        
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

            //redicionando o user
            header("Location: http://localhost/BicoJobs/templates/servicos.php");
            
        }
        else{
            $last_id = $sql_query->rowCount();

            // Cria um novo usuario no banco de dados
            $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento) VALUES ($last_id ,'$this->nome', '$this->cpf', '$this->senha', $this->cep, $this->id_contato , 0,'$this->dt_nascimento')";
        
            $pdo->query($sql);

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

            //redicionando o user
            header("Location: http://localhost/BicoJobs/templates/servicos.php");
            
        }
    }



    public function alterar_tipo($id,$pdo,$img_perfil,$descricao,$habilidade,$idioma,$telefone,$nome_comp, $usuario) : void
    {
        $id_contato = $pdo->query("SELECT id_contato FROM usuario WHERE id = $this->id");
        $id_contato = $id_contato->fetch(PDO::FETCH_ASSOC);
        $id_contato = $id_contato['id_contato'];

        $usuario -> setIdioma($pdo, $idioma);
        $usuario -> setHabilidades($pdo, $habilidade);
        $usuario -> setImgPerfil($pdo, $img_perfil);
        $usuario -> setNomeComp($pdo, $nome_comp);
        $usuario -> setDescricao($pdo, $descricao);
        $usuario -> setTelefone($pdo, $telefone,$id_contato);

        // INCREMENTO NO PERFIL DE USUARIO
        $sql = "UPDATE usuario SET tipo_usuario= 1 WHERE id = $id";
        $pdo->query($sql);    
        // INCREMENTO NO PERFIL DE USUARIO

        $user = $this->getUsuario($pdo);

        if(!isset($_SESSION)){
            session_reset();
        }

        $_SESSION = $user;
        echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";

    }


    public function retornar_info($pdo) : void
    {
        if($this -> tipo_usuario == 1){
            $idioma = $this->getIdioma($pdo);
            $cidade = $this->getCidade($pdo);
            $contatos = $this->getContatos($pdo);
            $avaliacao = $this->getNotas($pdo);

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['idioma'] = $idioma;
            $_SESSION['email'] = $contatos['email'];
            $_SESSION['telefone'] = $contatos['telefone'];
            $_SESSION['avaliacao'] = $avaliacao;
            $_SESSION['cidade'] = $cidade;
        }
        else{
            $cidade = $this->getCidade($pdo);
            $_SESSION['cidade'] = $cidade;
        }
    }


    public function editar_perfil($pdo, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep) : void
    {
        // Pegar as chaves estrangeiras para efetuar edição
        $sql_code = "SELECT id_contato FROM usuario WHERE id = '$this->id'";
        $sql_query = $pdo->query($sql_code);
        $sql_query = $sql_query->fetch(PDO::FETCH_ASSOC);
        $id_contato = $sql_query['id_contato'];


        $this -> setImgPerfil($pdo, $img_perfil);
        $this -> setHabilidades($pdo, $habilidade);
        $this -> setNome($pdo, $nome);
        $this -> setDescricao($pdo, $descricao);
        $this -> setNomeComp($pdo, $nome_comp);
        $this -> setIdioma($pdo, $idioma);
        $this -> setEmail($pdo, $email, $id_contato);
        $this -> setTelefone($pdo, $telefone, $id_contato);
        $this -> setCidade($pdo, $cep);


        session_reset();
        $user = $this->getUsuario($pdo);

        $_SESSION = $user;
        $_SESSION['cidade'] = $cep;

        echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";
    }
}