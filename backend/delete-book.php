<?php
require 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id'])) {
    echo json_encode(["error" => "ID manquant"]);
    exit;
}

$id = (int)$data['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(["message" => "Livre supprimé"]);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de suppression"]);
}
?>
