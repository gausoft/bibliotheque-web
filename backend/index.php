<?php

require_once "config.php";

$db = new Database();
$pdo = $db->getConnection();




try {
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Erreur lors de la création de la table : " . $e->getMessage());

}


$query = $pdo->query("SELECT * FROM books");

$books = $query->fetchAll(PDO::FETCH_ASSOC );

header("Content-Type: application/json");
echo json_encode($books);





