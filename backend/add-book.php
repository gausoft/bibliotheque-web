<?php
require 'config.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['title'], $data['author'], $data['published_at'])) {
    echo json_encode(["error" => "Données manquantes"]);
    exit;
}

$title = htmlspecialchars($data['title']);
$author = htmlspecialchars($data['author']);
$available = isset($data['available']) ? (int)$data['available'] : 1;
$published_at = htmlspecialchars($data['published_at']);

try {
    $stmt = $pdo->prepare("INSERT INTO books (title, author, available, published_at) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $author, $available, $published_at]);
    echo json_encode(["message" => "Livre ajouté avec succès"]);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur d'ajout du livre"]);
}
?>
