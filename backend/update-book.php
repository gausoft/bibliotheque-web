<?php
require 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id'], $data['title'], $data['author'], $data['available'])) {
    echo json_encode(["error" => "Données incomplètes"]);
    exit;
}

$id = (int)$data['id'];
$title = htmlspecialchars($data['title']);
$author = htmlspecialchars($data['author']);
$available = (int)$data['available'];

try {
    $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, available = ? WHERE id = ?");
    $stmt->execute([$title, $author, $available, $id]);
    echo json_encode(["message" => "Livre mis à jour avec succès"]);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de mise à jour du livre"]);
}
?>
