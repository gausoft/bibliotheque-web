<?php

 class library{

   protected $PDO;

   public function __construct(){

   }
   public function getPdo(){
   try{
      $this->PDO = new PDO("sqlite:library.sqlite");
      $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
     }
     return $this->PDO;
}
   
 }

  

   



