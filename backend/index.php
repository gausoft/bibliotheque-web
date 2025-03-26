<?php
require 'book.php';
require 'add-book.php';
require 'config.php';

header("Access-Control-Alloow-Origin: *");
header("Content-Type: application/json; charset = utf8");
header("Access-Control-Alloow-Methods: GET");


if($_SERVER['REQUEST_METHOD'] === "GET")
{

    //instantiation de la base de donnée
        $connect = new database;
        $connect = $connect->getPdo();

        // recuperation des livres
        $book = new Book();
        $stmt = $book->getAllbook($connect);
        if($stmt->rowCount() > 0){
            $books[] = $stmt->fetchAll();

            echo json_encode($books);
        }else{
            echo json_encode(["Message' => 'aucun livre trouvé"]);

        }



}else{
    echo json_encode(["Message' => 'la methode n'est pas authorisé"]);
}

 


    
