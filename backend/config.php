<?php

class dataBase{

   private $db_name;
   private $db_user;
   private $db_host;
   private $db_pass;
   private $pdo;





   public function __construct($db_name,$db_user = "root", $db_pass = '',  $db_host = 'localhost')
   {
      $this->db_name = $db_name;
      $this->db_user = $db_user;
      $this->db_pass = $db_pass;
      $this->db_host = $db_host;
      
   } 

   private function getPDO(){
      if($this->pdo === null){
         $pdo = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",  $this->db_user, $this->db_pass);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->pdo = $pdo;
      }

      return $this->pdo;
   }
}



