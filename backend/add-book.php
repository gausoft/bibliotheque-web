<?php

require_once "config.php";

$db = new Database();
$pdo = $db->getConnection();


$data = json_decode(file_get_contents("php://input"), true);



     if (isset($data["title"], $data["author"], $data["published_at"])) {
        $sql = "INSERT INTO books (title, author, published_at) VALUES (:title, :author, :published_at)";
        $stmt = $pdo->prepare($sql);
    
        $stmt->execute([
        ":title" => $data["title"],
        
        ":author" => $data["author"],
        
    ]);

       echo json_encode(["message" => "Livre ajouté avec succès"]);

}   

      else {
      echo json_encode(["erreur" => "pas de données"]);






}


