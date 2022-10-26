<?php ob_start(); ?>

<p>il y a <?= $requete->rowCount() ?> films</p>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE FRANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $detailFilms) { ?>
                <tr>
                    <td><a href="index.php?action=detailFilms&id=<?= $detailFilms["id_film"] ?>"><?= $detailFilms["titre"] ?></a></td> 
                    <td><?= $detailFilms["annee_sortie_france"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";