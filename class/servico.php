<?php

class servico {
    private $id;
    private $id_categoria;
    private $id_cidade;
    private $nome;
    private $valor;
    private $valor_descricao;
    private $estado;
    private $horario;
    private $img_servico;

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

    public function setId_catagoria($id_categoria){
        $this -> id_categoria = $id_categoria;
    }
    public function setId_cidade(){
        $this -> id_cidade = $id_cidade;
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
    public function __construct($id, $id_categoria, $id_cidade, $nome, $valor, $valor_descricao, $estado, $horario, $img_servico){
        
        $this -> id = $id;
        $this -> id_categoria = $id_categoria;
        $this -> id_cidade = $id_cidade;
        $this -> nome = $nome;
        $this -> nome = $valor;
        $this -> valor_descricao = $valor_descricao;
        $this -> estado = $estado;
        $this -> horario = $horario;
        $this -> img_servico = $img_servico;

    }

}