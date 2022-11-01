<?php ob_start(); ?>



<table>
    <thead>
        <tr>
            <th>REALISATEUR (<?= $requete->rowCount() ?>)</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $realisateurs) { ?>
                <tr>
                    <td><a href="index.php?action=detailRealisateurs&id=<?=$realisateurs["id_personne"]?>"><?= $realisateurs["identite"] ?></a></td>
                    <td><?= $realisateurs["date"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des realisateurs";
$titre_secondaire = "REALISATEURS";
$contenu = ob_get_clean();
require "view/template.php";