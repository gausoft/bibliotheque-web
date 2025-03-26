<?php
header("Content-Type: application/json");
require_once "config.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["id"])) {
    echo json_encode(["error" => "ID manquant"]);
    exit;
}

$stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
$stmt->execute([$data["id"]]);

echo json_encode(["message" => "Livre supprimé"]);
?>
