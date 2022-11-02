<?php 
ob_start(); 
?>

<div class="role">
    <h2>Ajouter un Role</h2>
    <form class="form" action="index.php?action=addRole" method="post">
        <input type="text" name="nom_role" id="nom_role" placeholder="Ajouter un Rôle" required>
        <input type="submit" name="submit" class= btn value="AJOUTER">
    </form>
</div>

<div class="genre">
    <h2>Ajouter un Genre</h2>
    <form class="form"  action="index.php?action=addGenre" method="post">
        <input type="text" name="nom_genre" id="nom_genre" placeholder="Ajouter un Genre" required>
        <input type="submit" name="submit" class= btn value="AJOUTER">
    </form>
</div>

<div class="acteur">
    <h2>Ajouter un Acteur</h2>
    <form class="form" action="index.php?action=addActeur" method="post">
        <input type="text" name="nom" id="nom" placeholder="Nom" required><br>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
        <p>Choix du Sexe<p>
        <input type="radio" name="sexe" id="M" value="M" required>
        <label for="M">Masculin</label>
        <input type="radio" name="sexe" id="F" value="F" required>
        <label for="F">Féminin</label><br>
        <label for="date_naissance">Date de Naissance : </label>
        <input type="date" name="date_naissance" id="date_naissance" required><br>
        <label for="date_deces">Date de Décès : </label>
        <input type="date" name="date_deces" id="date_deces"><br>
        <input type="submit" name="submit" class=btn value="AJOUTER">
    </form>
</div>

<div class="realisateur">
    <h2>Ajouter un Réalisateur</h2>
    <form class="form" action="index.php?action=addRealisateur" method="post">
        <input type="text" name="nom" id="nom" placeholder="Nom" required><br>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
        <p>Choix du Sexe<p>
        <input type="radio" name="sexe" id="M" value="M" required>
        <label for="M">Masculin</label>
        <input type="radio" name="sexe" id="F" value="F" required>
        <label for="F">Féminin</label><br>
        <label for="date_naissance">Date de Naissance : </label>
        <input type="date" name="date_naissance" id="date_naissance" required><br>
        <label for="date_deces">Date de Décès : </label>
        <input type="date" name="date_deces" id="date_deces"><br>
        <input type="submit" name="submit" class= btn value="AJOUTER">    
    </form>
</div>

<div class="film">
    <h2>Ajouter un Film</h2>
    <form class="form" action="index.php?action=addFilm" method="post">
        <input type="text" name="titre" id="titre" placeholder="Titre" required><br>
        <input type="number" name="annee_sortie_france" id="annee_sortie_france" min="1880" max=2022 placeholder="Année de sortie" required><br>
        <input type="number" name="duree_minutes" id="duree_minutes" placeholder="durée en minutes" min="1" max="300" required><br>       
        <div id="glob" >
            <input type="number" name="note" id="note" required>
            <img id="tde_1" src="public/img/star.png" class="tde"/>
            <img id="tde_2" src="public/img/star.png" class="tde"/>
            <img id="tde_3" src="public/img/star.png" class="tde"/>
            <img id="tde_4" src="public/img/star.png" class="tde"/>
            <img id="tde_5" src="public/img/star.png" class="tde"/>    
        </div>    
        <input type="text" name="realisateur" id="id_realisateur" placeholder="Réalisateur" required><br>
        <input type="submit" name="submit" class= btn value="AJOUTER">
    </form>
</div>

<?php
$titre = "Formulaire";
$titre_secondaire = "FORMULAIRE";
$contenu = ob_get_clean();
require "view/template.php";
?>