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
        SELECT id_film, titre, annee_sortie_france
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
        INNER JOIN personne p ON p.id_personne = r.id_personne
        ORDER BY date_naissance"
        );
        require "view/listRealisateurs.php";
    }

    public function listGenre() {
        // On se connecte
        $pdo = Connect::seConnecter();
        // On exécute la requête de notre choix
        $requete = $pdo->query("
        SELECT nom_genre
        FROM genre "
        );
        require "view/listGenre.php";
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


    // AFFICHER LE DETAIL
    public function detailFilms($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT id_film, titre, DATE_FORMAT(f.annee_sortie_france, '%Y') AS anneeSortie, note, SEC_TO_TIME(f.duree_minutes *60) AS duree , CONCAT(p.prenom,' ',p.nom) AS realisateur
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE f.id_film = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
            SELECT CONCAT(p.prenom,' ', p.nom) AS listActeurs, r.nom_role AS nomRole
            FROM film f
            INNER JOIN jouer j ON j.id_film = f.id_film
            INNER JOIN acteur a ON j.id_acteur = a.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            INNER JOIN role r ON j.id_role = r.id_role
            WHERE f.id_film = :id;
        ");
        $requete2->execute(
            ["id" => $id]
        );

        require "view/detailFilms.php";
    }

}