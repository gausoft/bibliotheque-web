<?php
require 'add-book.php';
require 'config.php';

//instantiation de la base de donnée
 $connect = new library;
 $connect = $connect->getPdo();
 $date = date('Y:m:d');

 
 $book = new addBook('code clean','robert c',"$date");
 $book->addBook($connect);



 


    
