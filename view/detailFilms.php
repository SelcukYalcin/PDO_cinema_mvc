<?php ob_start(); ?>
<?php $detailFilms = $requete->fetch();?>

<div class="aside">
    <div>
        <h3><?= $detailFilms["titre"] ?></h3>
        <p>Réalisateur: <?= $detailFilms["realisateur"] ?></p>
        <p>Durée: <?= $detailFilms["duree"] ?></p>
        <p>Année de sortie: <?= $detailFilms["annee_sortie_france"] ?></p>
        <p>Note: <?= $detailFilms["note"] ?> / 5</p>        
    </div>
    <div>
        <h4>Casting</h4>
        <?php foreach($requete2->fetchAll() as $cast) { ?>               
            <ul> 
                <li class="acteur"><?= $cast["Acteur"] ?>  <span style="color: black;">(<?= $cast["Role"] ?>)</span></li> 
            </ul>
        <?php } ?>
    </div>
</div>


<?php

$titre = "Détail du film";
$titre_secondaire = "PDO Cinéma";
$contenu = ob_get_clean();
require "view/template.php";