<?php
header('Content-Type: application/json');
require_once 'config.php';

$searchTerm = $_GET['search'] ?? null;

try {
    if ($searchTerm) {
        $query = "SELECT * FROM books 
                 WHERE title LIKE :search OR author LIKE :search";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':search', "%$searchTerm%");
    } else {
        $query = "SELECT * FROM books";
        $stmt = $db->prepare($query);
    }
    
    $stmt->execute();
    
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'books' => $books
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de la récupération des livres',
        'error' => $e->getMessage()
    ]);
}
?>