<?php
namespace Pi\Bicojobs\Model;
require "../autoload.php";

interface AutenticarUser{
    public function login($mysqli,$email, $senha) :void;

    public function sign_in($sql_codes, $mysqli) : void;

    public function alterar_tipo($id,$mysqli,$img_perfil,$descricao,$habilidade,$idioma,$telefone,$nome_comp) : void;

    public function retornar_info($mysqli,$id_idioma, $id_contato, $id_cep, $id) : void;

    public function editar_perfil($mysqli, $id, $img_perfil, $descricao, $habilidade, $idioma, $telefone, $nome_comp, $nome, $email, $cep) : void;
}
