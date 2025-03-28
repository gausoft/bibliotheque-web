<?php
// Configuration de la base de données SQLite
try {
    $db = new PDO('sqlite:../bibliotheque.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Création de la table books si elle n'existe pas
    $db->exec("CREATE TABLE IF NOT EXISTS books (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        author TEXT NOT NULL,
        published_at DATE,
        available BOOLEAN DEFAULT 1
    )");
    
    // Insertion de données de test si la table est vide
    $count = $db->query("SELECT COUNT(*) FROM books")->fetchColumn();
    if ($count == 0) {
        $db->exec("INSERT INTO books (title, author, published_at, available) VALUES
            ('Le Petit Prince', 'Antoine de Saint-Exupéry', '1943-04-06', 1),
            ('1984', 'George Orwell', '1949-06-08', 1),
            ('Orgueil et Préjugés', 'Jane Austen', '1813-01-28', 0),
            ('Le Seigneur des Anneaux', 'J.R.R. Tolkien', '1954-07-29', 1)");
    }
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
?>