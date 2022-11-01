<?php ob_start(); ?>



<table>
    <thead>
        <tr>
            <th>GENRE (<?= $requete->rowCount() ?>)</th>
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
$titre_secondaire = "GENRES";
$contenu = ob_get_clean();
require "view/template.php";