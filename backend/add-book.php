<?php
require 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['title'], $data['author'])) {
    echo json_encode(["error" => "Données manquantes"]);
    exit;
}

$title = htmlspecialchars($data['title']);
$author = htmlspecialchars($data['author']);
$available = isset($data['available']) ? (int)$data['available'] : 1;

try {
    $stmt = $pdo->prepare("INSERT INTO books (title, author, available) VALUES (?, ?, ?)");
    $stmt->execute([$title, $author, $available]);
    echo json_encode(["message" => "Livre ajouté avec succès"]);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur d'ajout du livre"]);
}
?>
