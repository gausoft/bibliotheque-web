<?php

require_once "config.php";

$db = new Database();

$pdo = $db->getConnection();


$data = json_decode(file_get_contents("php://input"), true);



     if (isset($data["id"], $data["title"], $data["author"], $data["published_at"], $data["available"])) {
         $sql = "UPDATE books SET title = :title, author = :author, published_at = :published_at, available = :available WHERE id = :id";
         $stmt = $pdo->prepare($sql);

        $stmt->execute([
          "id" => $data["id"],
          "title" => $data["title"],
          "author" => $data["author"],
          "published_at" => $data["published_at"],
          " available" => $data["available"]
    ]);

      echo json_encode(["message" => "Livre mis à jour"]);


}     

      else {
      echo json_encode(["error" => "Données invalides"]);


}


