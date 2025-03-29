<?php

class database{

    private $dbFile = "biblitheque.db";
    private $pdo;

    public function __construct(){

        try{
            $this->pdo = new PDO("sqlite:" . $this->dbFile);
            $this->pdo->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);

            $sql = "CREATE TABLE IF NOT EXISTS books (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                author TEXT NOT NULL,
                published_at DATE NOT NULL,
                available BOOLEAN DEFAULT 1
            
            )";

      $this->pdo->exec($sql);
      

        } catch (PDOException $e){
            die("Erreur de connexion: " . $e->getMessage());
        
        }
    }

    public function getConnection(){
        
        return $this->pdo;


    }







}

