<?php

class database {
    private $host = "localhost";  
    private $dbname = "bibliotheque";  
    private $user = "root";  
    private $password = ""; 
    private $pdo;  


    public function __construct() {
        try {
            
            $this->pdo = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname, 
                $this->user, 
                $this->password
            );

        
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
        

            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }


