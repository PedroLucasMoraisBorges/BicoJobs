<?php
namespace Pi\Bicojobs\Infraestrutura\Persistencia;

// UTILIZANDO O NAMESPACE PARA USAR A CLASSE PDO
use PDO;
use PDOException;

    class CriadorConexao{
        public static function criarConexao() : PDO
        {
            try {
                // INFO DO BANCO DE DADOS
                $pdo = new PDO('mysql:host=localhost;dbname=bicojobs', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }
    }


