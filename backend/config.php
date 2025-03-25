<?php
$host = 'localhost';
$user = 'root'; 
$password = ''; 
$dbname = 'bibliotheque';

try {
    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    echo "Base de données créée avec succès.<br>";
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $queries = [
        "CREATE TABLE IF NOT EXISTS auteurs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(100) NOT NULL
        )",
        "CREATE TABLE IF NOT EXISTS livres (
            id INT AUTO_INCREMENT PRIMARY KEY,
            titre VARCHAR(255) NOT NULL,
            auteur_id INT,
            annee_publication YEAR,
            genre VARCHAR(100),
            disponible BOOLEAN DEFAULT TRUE,
            FOREIGN KEY (auteur_id) REFERENCES auteurs(id) ON DELETE SET NULL
        )"
    ];
 foreach ($queries as $query){
    $pdo->exec($query);
 } 
   
    echo "Tables créées avec succès.";
} catch (PDOException $e) {
die("Erreur : " . $e->getMessage());
}
