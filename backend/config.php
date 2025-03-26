<?php

class database{

    private $dbFile = "biblitheque.db";
    private $pdo;

    public function __construct(){



        try{
            $this->pdo = new PDO("sqlite" . this->$dbFile);
            $this->pdo->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);

        } catch (PDOException $e){
            die("Erreur de connexion: " . $e->getMessage());
        
        }
    }

    public function getConnection(){
        return $this->pdo;
    }


    private function createTable() {
    $sql = "CREATE TABLE books (
        id INTEGER PRIMARY KEY,
        title TEXT NOT NULL,
        author TEXT NOT NULL,
        published_at DATE NOT NULL,
        available BOOLEAN DEFAULT 1
    )";
    


    try {

        $this->pdo->exec($sql);
        echo "Base de données et table créée avec succès ";
    }catch (PDOException $e) {

      die ("Eururr au moment de la creation de la table :" . $e->getMessage());



    }
    




}





}

