<?php

 class database{


      public function getPdo(){
      try{
         $PDO = new PDO("sqlite:library.sqlite");
         $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e) {
         echo "Connection error: " . $e->getMessage();
      }
      return $PDO;
   }
   
}

  

   



