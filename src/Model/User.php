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
    }

    /*<=====================================================================================>*/
    

    // GET'S


    /*<=====================================================================================>*/

    public function getUsuario($pdo){
        // Retorna as informações do usuário
        $sql = "SELECT * FROM usuario WHERE id = '$this->id'";
        $usuario = ($pdo->query($sql))->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }

    public function getId(){
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

    /*<=====================================================================================>*/


    // SET's


    /*<=====================================================================================>*/

    public function setNome($pdo, $nome) : void{
        $pdo->query("UPDATE usuario SET nome = '$nome' WHERE id = '$this->id'");
    }

    public function setDescricao($pdo, $descricao) : void
    {
        $pdo->query("UPDATE usuario SET descricao = '$descricao' WHERE id = '$this->id'");
    }

    public function setNomeComp($pdo, $nome_comp) : void
    {
        $pdo->query("UPDATE usuario SET nome_comp = '$nome_comp' WHERE id = '$this->id'");
    }

    public function setHabilidades($pdo, $habilidade) : void
    {
        $pdo->query("UPDATE usuario SET habilidades = '$habilidade' WHERE id = '$this->id'");
    }

    public function setImgPerfil($pdo, $img_perfil) : void
    {
        $pdo->query("UPDATE usuario SET img_perfil = '$img_perfil' WHERE id = '$this->id'");
    }

    public function setIdioma($pdo, $idioma) : int
    {

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

        $sql = "UPDATE usuario SET id_idioma = '$id_idioma' WHERE id = '$this->id'";
        $pdo->query($sql);

        return $id_idioma;
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

        $pdo->query($sql_code);
        
    }

    public function setEmail($pdo, $email) : void{
        $pdo->query("UPDATE contato SET email= '$email' WHERE id = '$this->id_contato'");
    }

    public function setTelefone($pdo, $telefone){
        $pdo->query("UPDATE contato SET telefone= '$telefone' WHERE id = '$this->id_contato'");
    }

    /*<=====================================================================================>*/


    // FUNÇÕES ESPECÍFICAS PARA O CADASTRO


    /*<=====================================================================================>*/

    public function set_get_IdCidade($pdo)
    {
        // Verifica se tem a cidade no banco
        $sql_code = "SELECT id FROM cidade WHERE cep = '$this->cep'";
        $sql_last_id = "SELECT id FROM cidade";
        $sql_query = $pdo->query($sql_code);

        $row = $sql_query->fetch(PDO::FETCH_ASSOC);

        $sql_query_last_id = $pdo->query($sql_last_id);
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

    public function set_get_IdEmail($pdo)
    {
        $sql_code_last_id = "SELECT id FROM contato";
        $sql_query_last_id = $pdo->query($sql_code_last_id) or die("Falha na execuça do código SQL" .$pdo->error);

        $last_id = $sql_query_last_id->rowCount();

        $sql = "INSERT INTO contato (id, email) VALUES ($last_id, '$this->email')";
        $pdo->query($sql);
        $this->id_contato = $last_id;
    }

    /*<=====================================================================================>*/


    // LOGIN


    /*<=====================================================================================>*/

    public function login($user) : void
    {
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION = $user;

        //redicionando o user
        header("Location: http://localhost/BicoJobs/templates/servicos.php");
    }

    /*<=====================================================================================>*/


    // CADASTRO


    /*<=====================================================================================>*/

    public function inserirUserDb($pdo, $id){
        $sql = "INSERT INTO usuario (id ,nome, cpf, senha, id_cidade, id_contato,tipo_usuario,dt_nascimento ) VALUES ($id ,'$this->nome', '$this->cpf', '$this->senha', $this->cep, $this->id_contato, 0,'$this->dt_nascimento' )";
            
        $pdo->query($sql);

        $sql_code = "SELECT * FROM usuario WHERE cpf = '$this->cpf'";
        $sql_query = $pdo->query($sql_code) or die("Falha na execuça do código SQL" .$pdo->error);

        return $sql_query->fetch(PDO::FETCH_ASSOC);
    }



    public function sign_in($pdo) : void
    {
        $sql_code = "SELECT * FROM usuario";
        $sql_query = $pdo->query($sql_code) or die("Falha na execuça do código SQL" .$pdo->error);


        $this->set_get_IdEmail($pdo);
        $this->set_get_IdCidade($pdo);

        if($sql_query->rowCount() <= 0){
            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION = $this->inserirUserDb($pdo,0);

            // Redicionando o user
            header("Location: http://localhost/BicoJobs/templates/servicos.php");
            
        }
        else{
            $last_id = $sql_query->rowCount();
            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION = $this->inserirUserDb($pdo,$last_id);

            // Redicionando o user
            header("Location: http://localhost/BicoJobs/templates/servicos.php");
            
        }
    }

    /*<=====================================================================================>*/


    // ALTERAÇÃO E EDIÇÃO DE USUÁRIO


    /*<=====================================================================================>*/

    public function alterar_tipo($id,$pdo,$img_perfil,$descricao,$habilidade,$idioma,$telefone,$nome_comp, $usuario) : void
    {
        $this->id_contato = ($this->getUsuario($pdo))['id_contato'];

        $usuario -> setIdioma($pdo, $idioma);
        $usuario -> setHabilidades($pdo, $habilidade);
        $usuario -> setImgPerfil($pdo, $img_perfil);
        $usuario -> setNomeComp($pdo, $nome_comp);
        $usuario -> setDescricao($pdo, $descricao);
        $usuario -> setTelefone($pdo, $telefone);

        $sql = "UPDATE usuario SET tipo_usuario= 1 WHERE id = $id";
        $pdo->query($sql);    

        $user = $this->getUsuario($pdo);

        if(!isset($_SESSION)){
            session_reset();
        }

        $_SESSION = $user;
        echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";

    }


    public function retornar_info($pdo) : void
    {
        $contatos = $this->getContatos($pdo);
        if($this -> tipo_usuario == 1){
            $idioma = $this->getIdioma($pdo);
            $cidade = $this->getCidade($pdo);
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
            $_SESSION['email'] = $contatos['email'];
        }
    }


    public function editar_perfil($pdo, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep) : void
    {
        $this->id_contato = ($this->getUsuario($pdo))['id_contato'];


        $this -> setImgPerfil($pdo, $img_perfil);
        $this -> setHabilidades($pdo, $habilidade);
        $this -> setNome($pdo, $nome);
        $this -> setDescricao($pdo, $descricao);
        $this -> setNomeComp($pdo, $nome_comp);
        $this -> setIdioma($pdo, $idioma);
        $this -> setEmail($pdo, $email);
        $this -> setTelefone($pdo, $telefone);
        $this -> setCidade($pdo, $cep);


        session_reset();
        $user = $this->getUsuario($pdo);

        $_SESSION = $user;

        echo "<script>open('http://localhost/BicoJobs/templates/servicos.php' , '_self');</script>";
    }

    /*<=====================================================================================>*/



    public function getServicosPendencias($pdo){
        $sql = "SELECT count(id) FROM servico WHERE id_usuario = $this->id AND estado = 1";
        $pendencia = ($pdo->query($sql))->fetch(PDO::FETCH_ASSOC);

        return $pendencia['count(id)'];
    }
}