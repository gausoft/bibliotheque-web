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







}

