<?php
header("Content-Type: application/json");
require_once "config.php";

$stmt = $pdo->query("SELECT * FROM books ORDER BY id DESC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
