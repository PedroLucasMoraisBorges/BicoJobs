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
            $sql = "INSERT INTO servico (nome, valor, descricao, estado, horario, img_servico, id_categoria, contato) VALUES ('$this->nome', '$this->valor', '$this->valor_descricao', '$this->estado', '$this->horario', '$this->img_servico', $last_id, '$this->contato')";

            $mysqli->query($sql_categoria);
            if($mysqli->query($sql) === FALSE){
                echo "Failed Insertion!";
            }
        }
        else{
            $id_categoria = ($sql_query->fetch_assoc())['id'];
            $sql = "INSERT INTO servico (nome, valor, descricao, estado, horario, img_servico, id_categoria, contato) VALUES ('$this->nome', '$this->valor', '$this->valor_descricao', '$this->estado', '$this->horario', '$this->img_servico', $id_categoria, '$this->contato')";

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


    
    public function mostrarServicos($mysqli, $id, $id_usuario, $nome_cliente, $cidade){
        $caminho = 'http://localhost/BicoJobs/';
        
        if($this->valor == 0.0){
            $this->valor = "A combinar";
        }

        if(str_contains("@", $this->contato)){
            $contatar = "mailto:pedrulucas000@gmail.com?subject=BicoJobs (Solicitação de serviço) & body=Olá, me chamo $nome_cliente sou de $cidade e estou solicitando o seu serviço de $this->nome' class = 'contatar";
        }
        else{
            $contatar =  "https://wa.me/".$this->contato;
        }
        

        $sql = "SELECT * FROM usuario WHERE id = $id_usuario";
        $sql_result = $mysqli->query($sql);
        $user = $sql_result->fetch_assoc();

        $nome_comp_ofertante = $user['nome_comp'];
        $nome_user = $user['nome'];
        $avaliacao = $user['avaliacao'];

        if($this->img_servico == NULL){
            $this->img_servico = "general_work.svg";
        }

        echo "<div class='card' id='card$id'>

        <img src='$caminho/media/img_services/$this->img_servico' alt='#' class='img_fundo'>

        <img src='$caminho/media/fundo_azul.svg' alt='' class='fundo_azul'>

        <div class='card_detalhes'>


            <div class='info_princ'>
                <img src='$caminho/media/area-atuação/limpeza.svg' alt=''>
                <h2>$this->nome</h2>
            </div>
            

            <div class='info_sec'>
                <p><strong>Horário:</strong> $this->horario</p>
                <p><strong>Valor:</strong> $this->valor</p>
                <p><strong>$nome_user</strong>   $avaliacao</p>
            </div>
            
        </div>


        <button class='botao_abrir' id='btn$id' onclick='verOferta()'>
            Abrir
        </button>

        
        <div class='modal_verOferta none' id='modal_btn$id'>
            <div class='modal_header'>
                <h2>Detalhes da oferta</h2>
            </div>
            <div class='oferta_detalhes'>
                <div class='pessoais'>
                    <div class='img'>
                        <img src='$caminho/media/area-atuação/limpeza.svg' alt=''>
                    </div>
                    <h3>$nome_comp_ofertante</h3>
                    <p>4.0</p>
                </div>
                <div class='oferta'>
                    <p><strong>Serviço: </strong>$this->nome</p>
                    <p><strong>Horário: </strong>$this->horario</p>
                    <p><strong>Descrição: </strong>$this->valor_descricao</p>
                    <p><strong>Valor: </strong>$this->valor</p>
                    <p><strong>Contato: </strong>$this->contato</p>
                </div>
            </div>
            <hr>
            <div class='modal_footer'>
                <button class='fechar' onclick='fecharModal()'>
                    Fechar
                </button>
                <a href='$contatar' target = '_blank'>
                    <label for'mudar_estado'>Fazer Contato</label>
                    <input type'submit' class = 'none' name = 'mudar_estado'>
                </a>
            </div>
        </div>
    </div>";
    }
}