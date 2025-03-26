<?php 

require 'book.php';
require 'config.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset = utf8");
header("Access-Control-Allow-Methods: POST");


if($_SERVER['REQUEST_METHOD'] === "POST")
{

    //instantiation de la base de donnée
        $connect = new connectionDb;
        $connect = $connect->getConnect();

        //instantiation d'un livre et ajout du livre a la base de donnés
        $book = new Book();
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($data->title) && !empty($data->author) && !empty($data->publish_at)){
            $book->setTitle(htmlspecialchars($data->title));
            $book->setAuthor(htmlspecialchars($data->author));
            $book->setPublishDate(htmlspecialchars($data->publish_at));

            $req = $book->updateBook($connect);

            if($req){
                echo json_encode(['Message' => 'livre modifie']);
            }else{
                echo json_encode(['Message' => 'impossible de modifier le livre']);
            }


        }else{
            echo json_encode(['Message' => 'les données ne sont pas au complet']);
        }


}else{
    echo json_encode(["Message" => "la methode nést pas authorisé"]);
}




