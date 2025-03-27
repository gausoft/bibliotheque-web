<?php

require_once "config.php";

$db = new Database();
$pdo = $db->getConnection();


$sql = "CREATE TABLE IF NOT EXISTS books (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    author TEXT NOT NULL,
    published_at DATE NOT NULL,
    available BOOLEAN DEFAULT 

)";


try {
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Erreuur lors de la création de la table : " . $e->getMessage());




}


$query = $pdo->query("SELECT * FROM books");
$books = $query->fetchAll(PDO::FETCH_ASSOC);


header("Content-Type: application/json");
echo json_encode($books);





