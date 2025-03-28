<?php
header('Content-Type: application/json');
require_once 'config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(['success' => false, 'message' => 'ID manquant']);
    exit;
}

try {
    $query = "DELETE FROM books WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    echo json_encode([
        'success' => true,
        'message' => 'Livre supprimé avec succès'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de la suppression du livre',
        'error' => $e->getMessage()
    ]);
}
?>