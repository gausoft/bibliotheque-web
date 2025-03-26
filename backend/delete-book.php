<?php 

require 'book.php';
require 'config.php';

header("Access-Control-Alloow-Origin: *");
header("Content-Type: application/json; charset = utf8");
header("Access-Control-Alloow-Methods: POST");


if($_SERVER['REQUEST_METHOD'] === "POST")
{

    //instantiation de la base de donnée
        $connect = new database;
        $connect = $connect->getPdo();

        //instantiation d'un livre et ajout du livre a la base de donnés
        $book = new Book();
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($data->title)){
            $book->setTitle(htmlspecialchars($data->title));
            
            $req = $book->deleteBook($connect);

            if($req){
                echo json_encode(['Message' => 'livre supprimé']);
            }else{
                echo json_encode(['Message' => 'impossible de modifier le livre']);
            }


        }else{
            echo json_encode(['Message' => 'les données ne sont pas au complet']);
        }


}else{
    echo json_encode(['Message' => 'la methode nést pas authorisé']);
}




