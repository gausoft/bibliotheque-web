<?php
$db_file = __DIR__ . '/database.sqlite';

try {
    $pdo = new PDO("sqlite:$db_file");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la table si elle n'existe pas
    $pdo->exec("CREATE TABLE IF NOT EXISTS books (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        author TEXT NOT NULL,
        published_year INTEGER NOT NULL
    )");
} catch (PDOException $e) {
    die(json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]));
}
?>
