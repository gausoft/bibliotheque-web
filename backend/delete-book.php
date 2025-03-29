<?php

require_once "config.php";

$db = new Database();


$pdo = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

   if (isset($data["id"])) {

       $sql = "DELETE FROM books WHERE id = :id";
       $stmt = $pdo->prepare($sql);

    
       $stmt->execute([":id" => $data["id"]]);

    echo json_encode(["message" => "Livre supprimé"]);

} 

    else {


    echo json_encode(["ereur" => "ID manquant"]) ;


}


