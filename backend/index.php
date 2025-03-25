<?php
require_once 'Book.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['title'], $data['author'], $data['published_at'])) {
    $book = new Book();
    $result = $book->addBook($data['title'], $data['author'], $data['published_at']);

    echo json_encode(['success' => $result]);
} else {
    echo json_encode(['success' => false, 'message' => 'Données manquantes']);
}
?>
