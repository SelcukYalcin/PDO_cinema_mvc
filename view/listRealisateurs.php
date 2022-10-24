<?php ob_start(); ?>

<p>il y a <?= $requete->rowCount() ?> realisateurs</p>

<table>
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $realisateur) { ?>
                <tr>
                    <td><?= $realisateur["prenom"] ?></td>
                    <td><?= $realisateur["date_naissance"]?></td>
                    <td><?= $realisateur["nom"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean();
require "view/template.php";