<?php
require 'book.php';
require 'config.php';

header("Access-Control-Alloow-Origin: *");
header("Content-Type: application/json; charset = utf8");
header("Access-Control-Alloow-Methods: GET");


if($_SERVER['REQUEST_METHOD'] === "GET")
{

    //instantiation de la base de donnée
        $connect = new connectionDb;
        $connect = $connect->getConnect();

        // recuperation des livres
        $book = new Book();
        $stmt = $book->getAllBook($connect);

        if($stmt->rowCount() > 0){
            $books= $stmt->fetchAll(PDO::FETCH_ASSOC);


            echo json_encode($books);
        }else{
            echo json_encode(["Message' => 'aucun livre trouvé"]);

        }



}else{
    echo json_encode(["Message' => 'la methode n'est pas authorisé"]);
}

 


    
