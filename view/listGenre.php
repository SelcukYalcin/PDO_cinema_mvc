<?php ob_start(); ?>

<p>il y a <?= $requete->rowCount() ?> genres</p>

<table>
    <thead>
        <tr>
            <th>GENRES</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $detailGenres) { ?>
                <tr>
                    <td><a href="index.php?action=detailGenres&id=<?= $detailGenres["id_genre"] ?>"><?= $detailGenres["nom_genre"] ?></a></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste de genre";
$titre_secondaire = "Liste de genre";
$contenu = ob_get_clean();
require "view/template.php";