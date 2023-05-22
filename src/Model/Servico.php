<?php
namespace Pi\Bicojobs\Model;
require "../autoload.php";


use PDO;
class Servico implements AutenticarServico{
    private  int     $id;
    private  $id_usuario;
    private  int     $id_categoria;
    private  int     $id_cidade;
    private  string  $nome;
    private  string   $valor;
    private  string  $valor_descricao;
    private  int     $estado;
    private  string  $horario;
    private  string  $img_servico;
    private  string  $contato;
    private  string  $categoria;

    // GETs
    public function getId() : int
    {
        return $this -> id;
    }
    public function getId_categoria() : int
    {
        return $this -> id_categoria;
    }
    public function getId_cidade() : int 
    {
        return $this -> id_cidade;
    }
    public function getNome() : string
    {
        return $this -> nome;
    }
    public function getValor() : float
    {
        return $this -> valor;
    }
    public function getValor_Descricao() : string
    {
        return $this -> valor_descricao;
    }
    public function getEstado() : int 
    {
        return $this -> estado;
    }
    public function getHorario() : string
    {
        return $this -> horario;
    }
    public function getImg_servico() : string
    {
        return $this -> img_servico;
    }

    //SETs
    public function setId($id) : void
    {
        $this -> id = $id;
    }

    public function setId_categoria($id_categoria) : void
    {
        $this -> id_categoria = $id_categoria;
    }
    public function setId_cidade($mysqli, $id) : void
    {
        $this -> id_cidade = $id;
        $sql = "UPDATE servico SET id_cidade = '$id' WHERE id = '$this->id'";
        if($mysqli->query($sql) === FALSE){
            echo "Conection Failed!";
        }
    }

    public function setNome($nome) : void
    {
        $this -> nome = $nome;
    }

    public function setValor($valor) : void 
    {
        $this -> nome = $valor;
    }
    
    public function setValor_Descricao($valor_descricao) : void
    {
        $this -> valor_descricao = $valor_descricao;
    }
    public function setEstado($estado) : void
    {
        $this -> estado = $estado;
    }
    public function setHorario($horario) : void
    {
        $this -> horario = $horario;
    }
    public function setImg_servico($img_servico) : void
    {
        $this -> img_servico = $img_servico;
    }


    //CONSTRUCT
    public function __construct($id_cidade,$nome, $valor, $valor_descricao, $estado, $horario, $img_servico, $contato, $categoria, $id_usuario){
        $this -> nome = $nome;
        $this -> valor = $valor;
        $this -> valor_descricao = $valor_descricao;
        $this -> estado = $estado;
        $this -> horario = $horario;
        $this -> img_servico = $img_servico;
        $this -> contato = $contato;
        $this -> categoria = $categoria;
        $this -> id_usuario = $id_usuario;
        $this -> id_cidade = $id_cidade;
    }

    public function inserirNoDB($mysqli) : void
    {
        $sql = "SELECT * FROM categoria";
        $sql_query = $mysqli->query($sql);
        $last_id = $sql_query->rowCount();

        $sql = "SELECT * FROM categoria WHERE categoria = '$this->categoria'";
        $sql_query = $mysqli->query($sql);

        if($sql_query->rowCount() == 0){
            $sql_categoria = "INSERT INTO categoria (id, categoria) VALUES ($last_id, '$this->categoria')";
            $sql = "INSERT INTO servico (id_cidade, nome, valor, descricao, estado, horario, img_servico, id_categoria, contato,id_usuario) VALUES ($this->id_cidade, '$this->nome', '$this->valor', '$this->valor_descricao', '$this->estado', '$this->horario', '$this->img_servico', $last_id, '$this->contato' ,$this->id_usuario)";

            $mysqli->query($sql_categoria);
            if($mysqli->query($sql) === FALSE){
                echo "Failed Insertion!";
            }
        }
        else{
            $id_categoria = ($sql_query->fetch(PDO::FETCH_ASSOC))['id'];
            $sql = "INSERT INTO servico (id_cidade, nome, valor, descricao, estado, horario, img_servico, id_categoria, contato, id_usuario) VALUES ($this->id_cidade, '$this->nome', '$this->valor', '$this->valor_descricao', '$this->estado', '$this->horario', '$this->img_servico', $id_categoria, '$this->contato', $this->id_usuario)";

            if($mysqli->query($sql) === FALSE){
                echo "Failed Insertion!";
            }
        }

        

        $result = $mysqli->query("SELECT max(id) FROM servico");

        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $id = $row['max(id)'];   
        }

        $this->id = $id;
        
        
    }


    
    public function mostrarServicos($mysqli, $id, $id_usuario, $nome_cliente, $cidade) : void
    {
        $caminho = 'http://localhost/BicoJobs/';
        
        if($this->valor == 0.0){
            $this->valor = "A combinar";
        }

        if(str_contains($this->contato, "@") == true){
            $contatar = "mailto:$this->contato?subject=BicoJobs (Solicitação de serviço) & body=Olá, me chamo $nome_cliente sou de $cidade e estou solicitando o seu serviço de $this->nome' class = 'contatar";
        }
        else{
            $contatar =  "https://wa.me/".$this->contato."?text=Olá!%20Me%20chamo%20".$nome_cliente.",%20sou%20de%20".$cidade."%20e%20vim%20diretamente%20do%20BicoJobs%20para%20solicitar%20o%20seu%20serviço%20de%20".$this->nome;
        }
        

        $sql = "SELECT * FROM usuario WHERE id = $this->id_usuario";
        $sql_result = $mysqli->query($sql);
        
        $user = $sql_result->fetch(PDO::FETCH_ASSOC);

        $id_user = $user['id'];
        $nome_comp_ofertante = $user['nome_comp'];
        $nome_user = $user['nome'];
        $avaliacao = 0;

        $sql = "SELECT notas FROM notas WHERE id_usuario = '$id_user'";
        $result = $mysqli->query($sql);
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
        

        if($this->img_servico == NULL){
            $this->img_servico = "general_work.svg";
        }
        
        include("../templates/componentes/card_servico_home.php");

    }
}