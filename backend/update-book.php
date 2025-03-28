<?php
header('Content-Type: application/json');
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'], $data['title'], $data['author'], $data['published_at'])) {
    echo json_encode(['success' => false, 'message' => 'Données manquantes']);
    exit;
}

try {
    $query = "UPDATE books SET title = :title, author = :author, published_at = :published_at, available = :available WHERE id = :id";
    $stmt = $db->prepare($query);
    
    $stmt->bindValue(':id', $data['id'], PDO::PARAM_INT);
    $stmt->bindValue(':title', $data['title']);
    $stmt->bindValue(':author', $data['author']);
    $stmt->bindValue(':published_at', $data['published_at']);
    $stmt->bindValue(':available', $data['available'] ?? true, PDO::PARAM_BOOL);
    
    $stmt->execute();
    
    echo json_encode([
        'success' => true,
        'message' => 'Livre mis à jour avec succès'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de la mise à jour du livre',
        'error' => $e->getMessage()
    ]);
}
?>