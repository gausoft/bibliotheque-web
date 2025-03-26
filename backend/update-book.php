<?php
header("Content-Type: application/json");
require_once "config.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["id"], $data["title"], $data["author"], $data["published_year"])) {
    echo json_encode(["error" => "Données manquantes"]);
    exit;
}

$stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, published_year = ? WHERE id = ?");
$stmt->execute([$data["title"], $data["author"], $data["published_year"], $data["id"]]);

echo json_encode(["message" => "Livre mis à jour"]);
?>
