<?php ob_start(); ?>
<?php $detailFilms = $requete->fetch();?>

<div class="aside">
    <div>
        <h1><?= $detailFilms["titre"] ?></h1>
        <p><?= $detailFilms["note"] ?> / 5</p>
        <p><?= $detailFilms["duree"] ?></p>
        <p><?= $detailFilms["realisateur"] ?></p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ACTEUR</th>
                <th>ROLE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requete2->fetchAll() as $cast) { ?>
            <tr>
                <td><?= $cast["Acteur"] ?></td>
                <td><?= $cast["Role"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail du film";
$titre_secondaire = "Détail du film";
$contenu = ob_get_clean();
require "view/template.php";