<?php
header('Content-Type: application/json');
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['title'], $data['author'], $data['published_at'])) {
    echo json_encode(['success' => false, 'message' => 'Données manquantes']);
    exit;
}

try {
    $query = "INSERT INTO books (title, author, published_at, available) VALUES (:title, :author, :published_at, :available)";
    $stmt = $db->prepare($query);
    
    $stmt->bindValue(':title', $data['title']);
    $stmt->bindValue(':author', $data['author']);
    $stmt->bindValue(':published_at', $data['published_at']);
    $stmt->bindValue(':available', $data['available'] ?? true, PDO::PARAM_BOOL);
    
    $stmt->execute();
    
    echo json_encode([
        'success' => true,
        'message' => 'Livre ajouté avec succès',
        'book_id' => $db->lastInsertId()
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de l\'ajout du livre',
        'error' => $e->getMessage()
    ]);
}
?>