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
        SELECT titre, annee_sortie_france
        FROM film
        ORDER BY annee_sortie_france"
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
        INNER JOIN personne p ON p.id_personne = a.id_personne
        ORDER BY date_naissance"
    );
        require "view/listActeurs.php";
    }

    public function listRealisateurs() {
        // On se connecte
        $pdo = Connect::seConnecter();
        // On exécute la requête de notre choix
        $requete = $pdo->query("
        SELECT nom, prenom, date_naissance
        FROM realisateur r
        INNER JOIN personne p ON p.id_personne = a.id_personne
        ORDER BY date_naissance"
    );
        require "view/listRealisateurs.php";
    }

    public function listGenres() {
        // On se connecte
        $pdo = Connect::seConnecter();
        // On exécute la requête de notre choix
        $requete = $pdo->query("
        SELECT nom_genre
        FROM genre "
    );
        require "view/listGenres.php";
    }
    public function listRoles() {
        // On se connecte
        $pdo = Connect::seConnecter();
        // On exécute la requête de notre choix
        $requete = $pdo->query("
        SELECT nom_role
        FROM  role"
    );
        require "view/listRoles.php";
    }

    public function accueil() {
        require "view/accueil.php";
    }

}