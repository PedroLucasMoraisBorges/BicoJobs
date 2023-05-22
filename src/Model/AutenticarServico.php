<?php
namespace Pi\Bicojobs\Model;
require "../autoload.php";

interface AutenticarServico{
    public function setId_cidade($mysqli, $id) : void;

    public function inserirNoDB($mysqli) : void;

    public function mostrarServicos($mysqli, $id, $id_usuario, $nome_cliente, $cidade) : void;
}