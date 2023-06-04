<?php
namespace Pi\Bicojobs\Model;
require "../autoload.php";


class Paginator{
    private $page;
    private $limit;
    private $start;
    private $lines;
    private $quantia;

    public function query($pdo, $sql)
    {
        // VARIÁVEIS DE TRATAMENTO
        // PG = número da página, limit = limite de elementos por página, start é o número do elemento que inicia a página
        $capture = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);
        $this -> page = ($capture == "" ? 1 : $capture);
        $this -> limit = 2;
        $this -> start = ($this->page * $this->limit) - $this->limit;

        $sql_query = $pdo -> prepare($sql." AND serv_status = :status LIMIT $this->start, $this->limit");
        $sql_query -> bindValue(":status", 1);
        $sql_query -> execute();

        return $sql_query;
    }


    public function queryTotal($pdo, $sql){
        $sql_rows = $pdo->query($sql);

        // LINES É A QUANTIDADE DE ELEMENTOS SELECIONAOS E QUANTIA É A QUANTIDADE DE PÁGINAS
        $this->lines = $sql_rows->rowCount();
        $this->quantia = ceil($this->lines/$this->limit);
    }

    public function getPage() : int
    {
        return $this->page;
    }

    public function getQuantia() : int
    {
        return $this->quantia;
    }

    public function getNull($frase) : string
    {
        return '<div class="read_list"> 
        <img src="../media/svg/read_list.svg" alt="Read List">
        <p>'.$frase.'</p>
        </div>';
    }
}