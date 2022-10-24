<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    // lister les films
    public function listFilms() {
        // On se connecte
        $pdo = Connect::seConnecter();
        // On exécute la requête de notre choix
        $requete = $pdo->query("
        SELECT titre, anne_sortie_france
        FROM film"
    );
    // On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    require "view/listFilms.php";
    }
    public function listActeurs() {
        // On se connecte
        $pdo = Connect::seConnecter();
        // On exécute la requête de notre choix
        $requete = $pdo->query("
        SELECT nom, prenom, date_naissance
        FROM acteur a
        INNER JOIN personne p ON p.id_personne = a.id_personne"
    );
        require "view/listActeurs.php";
   

    }
}
