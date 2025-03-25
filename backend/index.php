<?php

class Livre {
    private $titre;
    private $auteur;
    private $annee_publication;
    private $isavailable;

    public function __construct($titre, $auteur, $annee_publication, $isavailable) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->annee_publication = $annee_publication;
        $this->isavailable = true;
    }

    public function afficherInfo() {
        return "Titre: {$this->titre}, Auteur: {$this->auteur}, Année: {$this->annee_publication}, Disponibilite: {$this->isavailable}";
    }
}

class Bibliotheque {
    private $livres = [];

    public function ajouterLivre(Livre $livre) {
        $this->livres[] = $livre;
    }

    public function afficherLivres() {
        if (empty($this->livres)) {
            return "Aucun livre dans la bibliothèque.";
        }
        
        $infos = array_map(fn($livre) => $livre->afficherInfo(), $this->livres);
        return implode("\n", $infos);
    }
}