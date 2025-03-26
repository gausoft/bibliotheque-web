<?php
header("Content-Type: application/json");
require_once "config.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["title"], $data["author"], $data["published_year"])) {
    echo json_encode(["error" => "Données manquantes"]);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO books (title, author, published_year) VALUES (?, ?, ?)");
$stmt->execute([$data["title"], $data["author"], $data["published_year"]]);

echo json_encode(["message" => "Livre ajouté"]);
?>
