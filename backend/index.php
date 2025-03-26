<?php
require 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM books");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($books);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de récupération des livres"]);
}
?>
