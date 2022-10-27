<?php ob_start(); ?>
<?php $detailFilms = $requete->fetch();?>

<div class="aside">
    <div>
        <h1><?= $detailFilms["titre"] ?></h1>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>NOTE</th>
                <th>DUREE</th>
                <th>REALISATEUR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $detailFilms["note"] ?> / 5</td>
                <td><?= $detailFilms["duree"] ?></td>
                <td><?= $detailFilms["realisateur"] ?></td>
            </tr>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail du film";
$titre_secondaire = "Détail du film";
$contenu = ob_get_clean();
require "view/template.php";