<?php


include("../conection/conection.php");

class servico {
    private $id;
    private $id_usuario;
    private $id_categoria;
    private $id_cidade;
    private $nome;
    private $valor;
    private $valor_descricao;
    private $estado;
    private $horario;
    private $img_servico;
    private $contato;

    private $categoria;

    // GETs
    public function getId(){
        return $this -> id;
    }
    public function getId_categoria(){
        return $this -> id_categoria;
    }
    public function getId_cidade(){
        return $this -> id_cidade;
    }
    public function getNome(){
        return $this -> nome;
    }
    public function getValor(){
        return $this -> valor;
    }
    public function getValor_Descricao(){
        return $this -> valor_descricao;
    }
    public function getEstado(){
        return $this -> estado;
    }
    public function getHorario(){
        return $this -> horario;
    }
    public function getImg_servico(){
        return $this -> img_servico;
    }

    //SETs
    public function setId($id){
        $this -> id = $id;
    }

    public function setId_usuario($mysqli,$id){
        $this->id_usuario = $id;
        $sql = "UPDATE servico SET id_usuario = '$id' WHERE id = '$this->id'";
        if($mysqli->query($sql) === FALSE){
            echo "Conection Failed!";
        }
    }

    public function setId_categoria($id_categoria){
        $this -> id_categoria = $id_categoria;
    }
    public function setId_cidade($mysqli, $id){
        $this -> id_cidade = $id;
        $sql = "UPDATE servico SET id_cidade = '$id' WHERE id = '$this->id'";
        if($mysqli->query($sql) === FALSE){
            echo "Conection Failed!";
        }
    }

    public function setNome($nome){
        $this -> nome = $nome;
    }

    public function setValor($valor){
        $this -> nome = $valor;
    }
    
    public function setValor_Descricao($valor_descricao){
        $this -> valor_descricao = $valor_descricao;
    }
    public function setEstado($estado){
        $this -> estado = $estado;
    }
    public function setHorario($horario){
        $this -> horario = $horario;
    }
    public function setImg_servico($img_servico){
        $this -> img_servico = $img_servico;
    }


    //construct
    public function __construct($nome, $valor, $valor_descricao, $estado, $horario, $img_servico, $contato, $categoria){
        $this -> nome = $nome;
        $this -> valor = $valor;
        $this -> valor_descricao = $valor_descricao;
        $this -> estado = $estado;
        $this -> horario = $horario;
        $this -> img_servico = $img_servico;
        $this -> contato = $contato;
        $this -> categoria = $categoria;
    }

    public function inserirNoDB($mysqli){
        $sql = "SELECT * FROM categoria";
        $sql_query = $mysqli->query($sql);
        $last_id = $sql_query->num_rows;

        $sql = "SELECT * FROM categoria WHERE categoria = '$this->categoria'";
        $sql_query = $mysqli->query($sql);

        if($sql_query->num_rows == 0){
            $sql_categoria = "INSERT INTO categoria (id, categoria) VALUES ($last_id, '$this->categoria')";
            $sql = "INSERT INTO servico (nome, valor, descricao, estado, horario, img_servico, id_categoria) VALUES ('$this->nome', '$this->valor', '$this->valor_descricao', '$this->estado', '$this->horario', '$this->img_servico', $last_id)";

            $mysqli->query($sql_categoria);
            if($mysqli->query($sql) === FALSE){
                echo "Failed Insertion!";
            }
        }
        else{
            $id_categoria = ($sql_query->fetch_assoc())['id'];
            $sql = "INSERT INTO servico (nome, valor, descricao, estado, horario, img_servico, id_categoria) VALUES ('$this->nome', '$this->valor', '$this->valor_descricao', '$this->estado', '$this->horario', '$this->img_servico', $id_categoria)";

            if($mysqli->query($sql) === FALSE){
                echo "Failed Insertion!";
            }
        }

        

        $result = $mysqli->query("SELECT max(id) FROM servico");

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $id = $row['max(id)'];   
        }

        $this->id = $id;
        
    }

}