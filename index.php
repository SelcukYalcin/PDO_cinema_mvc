<?php
// On "use" le controller Cinema
use Controller\CinemaController;

// On autocharge les classes du projet
spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});

$id= isset($_GET["id"]) ? $_GET["id"] : "";
// On instancie le controller Cinema
$ctrlCinema = new CinemaController();

// Et en fonction de l'action détectée dans l'URL via la propriété "action" on interagit avec la bonne méthode du controller
if(isset($_GET["action"])) {
    switch ($_GET["action"]) {

    case "listFilms" : 
        $ctrlCinema->listFilms(); 
        break;
    case "listActeurs" :
        $ctrlCinema->listActeurs(); 
        break;
    case "listRealisateurs" :
        $ctrlCinema->listRealisateurs(); 
        break;
    case "listGenre" :
        $ctrlCinema->listGenre();
        break;
    case "listRoles" :
        $ctrlCinema->listRoles();
        break;
    case "detailFilms" :
        $ctrlCinema->detailFilms($id);
        break;
    case "detailActeurs" :
        $ctrlCinema->detailActeurs($id);
        break;
    case "detailRealisateurs" :
        $ctrlCinema->detailRealisateurs($id);
        break;
    // case "detailGenres" :
    //     $ctrlCinema->descriptionGenre($id);
    //     break;
    // case "detailRoles" :
    //     $ctrlCinema->descriptionRole($id);
    //     break;
    }   
}
    else {
        $ctrlCinema->accueil();        
}
