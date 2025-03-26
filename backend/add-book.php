<?php
require 'book.php';
require 'config.php';

header("Access-Control-Alloow-Origin: *");
header("Content-Type: application/json; charset = utf8");
header("Access-Control-Alloow-Methods: POST");


if($_SERVER['REQUEST_METHOD'] === "POST")
{

    //instantiation de la base de donnée
        $connect = new connectionDb;
        $connect = $connect->getConnect();

        
        $book = new Book();
        $data = json_decode(file_get_contents("php://input"));
        //verificaton des données reçus et ajout du livre a la base de données
        if(!empty($data->title) && !empty($data->author) && !empty($data->publish_at)){
            $book->setTitle(htmlspecialchars($data->title));
            $book->setAuthor(htmlspecialchars($data->author));
            $book->setPublishDate(htmlspecialchars($data->publish_at));
            
            $req = $book->addBook($connect);

            if($req){
                echo json_encode(['Message' => 'livre ajouté']);
            }else{
                echo json_encode(['Message' => 'impossible dájouter le livre']);
            }


        }else{
            echo json_encode(['Message' => 'les données ne sont pas au complet']);
        }


}else{
    echo json_encode(['Message' => 'la methode nést pas authorisé']);
}



