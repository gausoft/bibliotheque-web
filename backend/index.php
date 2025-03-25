<?php
require 'add-book.php';
require 'config.php';

 
 try{
    $pdo = new PDO("mysql:host=0.0.0.0;port=3306;dbname=library",  'root', 'pass1234');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->pdo = $pdo;
    // $db = new dataBase('library');
    // var_dump($db);
    echo "connecté";
   // $book = new book('ro','ls',date("d M H:i:s"));
   // $book->addBook($pdo);
   // var_dump($book);
}catch(PDOException $e) {
   echo "Connection error: " . $e->getMessage();
}

    
