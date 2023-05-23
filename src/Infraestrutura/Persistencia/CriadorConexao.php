<?php
namespace Pi\Bicojobs\Infraestrutura\Persistencia;

// UTILIZANDO O NAMESPACE PARA USAR A CLASSE PDO
use PDO;
    class CriadorConexao{
        private static $instace;
        public static function criarConexao() : PDO
        {
            if(!isset(self::$instace)){
                self::$instace = new PDO('mysql:host=localhost;dbname=bicojobs', 'root', '');
            }
            return self::$instace;
        }
    }


