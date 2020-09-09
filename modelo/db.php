<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'sitemaventas';
        $this->user     = 'root';
        $this->password = "";
        $this->charset  = 'utf8mb4';
    }

    function conectar(){
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            $pdo->exec('SET CHARACTER SET UTF8');
            //print_r("Conectado 2333333!");
           //return $pdo;

        }catch(PDOException $e){

            die('Error connection: ' . $e->getMessage());
            echo 'Linea del error: ' . $e->getLine();
        }   
         return $pdo;
    }
}

?>

