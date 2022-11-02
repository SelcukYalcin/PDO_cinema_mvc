<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    //----- LISTER LES SECTIONS -----
    public function listFilms() {
        //----- ON SE CONNECTE -----
        $pdo = Connect::seConnecter();
        //----- ON EXECUTE LA REQUETE DE NOTRE CHOIX -----
        $requete = $pdo->query("
        SELECT id_film, titre, annee_sortie_france
        FROM film
        ORDER BY annee_sortie_france"
        );
    //----- ON RELIE PAR UN "REQUIRE" LA VUE QUI NOUS INTERESSE (SITUE DANS "VIEW") -----
        require "view/listFilms.php";
    }

    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT a.id_personne, CONCAT(p.prenom,' ', p.nom) AS identite, 
        DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date
        FROM personne p
        INNER JOIN acteur a ON p.id_personne = a.id_personne
        ORDER BY p.date_naissance DESC
        ");
        require "view/listActeurs.php";
    }

    public function listRealisateurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT r.id_personne, CONCAT(p.prenom,' ',p.nom) AS identite, 
        DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date
        FROM realisateur r
        INNER JOIN personne p ON p.id_personne = r.id_personne
        ORDER BY date_naissance"
        );
        require "view/listRealisateurs.php";
    }

    public function listGenre() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_genre, nom_genre
        FROM genre "
        );
        require "view/listGenre.php";
    }
    
    public function listRoles() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_role, nom_role
        FROM  role"
        );
        require "view/listRoles.php";
    }

    public function accueil() {
        require "view/accueil.php";
    }


    //----- AFFICHER LE DETAIL -----
    public function detailFilms($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT id_film, titre, annee_sortie_france, note, 
            SEC_TO_TIME(f.duree_minutes *60) AS duree , CONCAT(p.prenom,' ',p.nom) AS realisateur
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE f.id_film = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
            SELECT CONCAT(p.prenom,' ', p.nom) AS Acteur, r.nom_role AS Role
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
    public function detailActeurs($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT p.id_personne, sexe, CONCAT(prenom,' ',nom) AS identite, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS date
            FROM personne p
            INNER JOIN acteur a ON p.id_personne = a.id_personne
            WHERE p.id_personne = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
            SELECT  p.id_personne, r.nom_role AS nomRole, f.titre, f.annee_sortie_france AS anneeSortie
            FROM film f
            INNER JOIN jouer j ON j.id_film = f.id_film
            INNER JOIN acteur a ON j.id_acteur = a.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            INNER JOIN role r ON j.id_role = r.id_role
            WHERE p.id_personne = :id 
            ORDER BY anneeSortie DESC
        ");
        $requete2->execute(
            ["id" => $id]
        );

        require "view/detailActeurs.php";
    }
    
    public function detailRealisateurs($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT r.id_personne, sexe, CONCAT(prenom,' ',nom) AS identite, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS date
            FROM personne p
            INNER JOIN realisateur r ON p.id_personne = r.id_personne
            WHERE r.id_personne = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
            SELECT r.id_personne, f.titre , f.annee_sortie_france AS anneeSortie
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE  r.id_personne = :id
            ORDER BY anneeSortie DESC
        ");
        $requete2->execute(
            ["id" => $id]
        );

        require "view/detailRealisateurs.php";
    }
    public function detailGenres($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT g.id_genre, g.nom_genre
        FROM genre g
        WHERE g.id_genre = :id"
        );
        $requete->execute(
            ["id" => $id]
        );
        $requete2 = $pdo->prepare("
        SELECT g.id_genre, g.nom_genre, f.titre
        FROM associer_genre ag
        INNER JOIN film f ON f.id_film = ag.id_film
        INNER JOIN genre g ON g.id_genre = ag.id_genre
        WHERE g.id_genre = :id"
        );
        $requete2->execute(
            ["id" => $id]
        );


        require "view/detailGenres.php";
    }
    public function detailRoles($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT r.id_role, r.nom_role
        FROM role r
        WHERE r.id_role = :id"
        );
        $requete->execute(
            ["id" => $id]
        );
        $requete2 = $pdo->prepare("
        SELECT nom_role, f.titre, CONCAT (p.prenom, ' ' , p.nom) AS acteur
        FROM role r
        INNER JOIN jouer j ON j.id_role = r.id_role
        INNER JOIN acteur a ON j.id_acteur = a.id_acteur
        INNER JOIN personne p ON p.id_personne = a.id_personne
        INNER JOIN film f ON j.id_film = f.id_film
        WHERE r.id_role = :id"
        );
        $requete2->execute(
            ["id" => $id]
        );


        require "view/detailRoles.php";
    }

    // ----- FORMULAIRE -----
    public function formulaire() {
        require "view/formulaire.php";
    } 
    //----- AJOUT D'UN CHAMP -----   
    public function addRole() {
        if (isset($_POST["submit"])) {
            $nom_role = filter_input(INPUT_POST, 'nom_role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($nom_role) {
                $pdo=Connect::seConnecter();
                $requete=$pdo->prepare("
                INSERT INTO role (nom_role) VALUES (:nom_role)
                ");
                $requete->execute([
                    ":nom_role" => $nom_role
                ]);
                //----- --> LISTE DES ROLES -----
                header("Location: index.php?action=listRoles"); die;
            }
        }
        require "view/formulaire.php";
    }
    //----- AJOUT D'UN CHAMP -----
    public function addGenre() {
        if (isset($_POST["submit"])) {
            $nom_genre = filter_input(INPUT_POST, 'nom_genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($nom_genre) {
                $pdo=Connect::seConnecter();
                $requete=$pdo->prepare("
                INSERT INTO genre (nom_genre) VALUES (:nom_genre)
                ");
                $requete->execute([
                    ":nom_genre" => $nom_genre
                ]);
                //----- --> LISTE DES GENRES -----
                header("Location: index.php?action=listGenre"); die;
            }
        }
        require "view/formulaire.php";
    }
    //----- AJOUT D'UN CHAMP -----
    public function addActeur() {
        // ----- FILTRES -----
        if(isset($_POST["submit"])) {
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateDeces = filter_input(INPUT_POST, 'date_deces', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($dateDeces == '') {
                $dateDeces = NULL;
            }
            //----- SI LES FILTRES SONT VALIDES ----- 
            if($nom && $prenom && $sexe && $date_naissance) {

                //----- CONNEXION ET INSERTION -----
                $pdo=Connect::seConnecter();
                $requete=$pdo->prepare("
                INSERT INTO personne (nom, prenom, sexe, date_naissance, date_deces) 
                VALUES (:nom, :prenom, :sexe, :date_naissance, :date_deces)
                ");
                $requete->execute([
                    ":nom" => $nom,
                    ":prenom" => $prenom,
                    ":sexe" => $sexe,
                    ":date_naissance" => $date_naissance,
                    ":date_deces" => NULL
                ]);

                $id_personne = $pdo->lastInsertId();
                $requete2=$pdo->prepare("
                INSERT INTO acteur (id_personne) 
                VALUES (:id_personne)
                ");
                $requete2->execute([
                    'id_personne' => $id_personne
                ]);


                //----- --> LISTE DES ACTEURS -----
                header("Location: index.php?action=listActeurs"); die;
            }
        }
        require "view/formulaire.php";
    }
    //----- AJOUT D'UN CHAMP -----
    public function addRealisateur() {
        if(isset($_POST["submit"])) {
            //----- FILTRES -----
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_deces = filter_input(INPUT_POST, 'date_deces', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($date_deces == '') {
                $date_deces = NULL;
            }
            //----- SI LES FILTRES SONT VALIDES -----
            if($nom && $prenom && $sexe && $date_naissance) {

                //----- CONNEXION ET INSERTION -----
                $pdo=Connect::seConnecter();
                $requete=$pdo->prepare("
                INSERT INTO personne (nom, prenom, sexe, date_naissance, date_deces) 
                VALUES (:nom, :prenom, :sexe, :date_naissance, :date_deces)
                ");
                $requete->execute([
                    ":nom" => $nom,
                    ":prenom" => $prenom,
                    ":sexe" => $sexe,
                    ":date_naissance" => $date_naissance,
                    ":date_deces" => NULL
                ]);

                $id_personne = $pdo->lastInsertId();
                $requete2=$pdo->prepare("
                INSERT INTO realisateur (id_personne) 
                VALUES (:id_personne)
                ");
                $requete2->execute([
                    'id_personne' => $id_personne
                ]);


                //----- --> LISTE DES REALISATEURS -----
                header("Location: index.php?action=listRealisateurs"); die;
            }
        }
        require "view/formulaire.php";
    }
    //----- AJOUT D'UN CHAMP -----
    public function addFilm() {
        if(isset($_POST["submit"])) {
           

            //----- FILTRES -----
            $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);           
            $annee_sortie_france = filter_input(INPUT_POST, 'annee_sortie_france', FILTER_SANITIZE_NUMBER_INT);
            $duree_minutes = filter_input(INPUT_POST, 'duree_minutes', FILTER_SANITIZE_NUMBER_INT);
            $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);
            $id_realisateur = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_NUMBER_INT); 
            //----- SI LES FILTRES SONT VALIDES -----
            //  var_dump($annee_sortie_france);die;
            if($titre && $annee_sortie_france && $duree_minutes && $note && $id_realisateur) {
                
                //----- CONNEXION ET INSERTION -----
                $pdo=Connect::seConnecter();
                $requete=$pdo->prepare("
                INSERT INTO film (titre, annee_sortie_france, duree_minutes, note, id_realisateur) 
                VALUES (:titre, :annee_sortie_france, :duree_minutes, :note, :id_realisateur)
                ");
                $requete->execute([
                    ":titre" => $titre,
                    ":annee_sortie_france" => $annee_sortie_france,
                    ":duree_minutes" => $duree_minutes,
                    ":note" => $note,                   
                    ":id_realisateur" => $id_realisateur
                ]);

          
            
                
                // $id_film = $pdo->lastInsertId();
                // $requete2=$pdo->prepare("
                // INSERT INTO film (id_film) 
                // VALUES (:id_film)
                // ");
                // $requete2->execute([
                //     'id_film' => $id_film
                // ]);
                header("Location: index.php?action=listFilms"); die;
            }
        }
        require  "view/formulaire.php";
    }

}