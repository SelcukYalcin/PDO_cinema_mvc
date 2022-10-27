<?php ob_start(); ?>

<p>il y a <?= $requete->rowCount() ?> acteurs</p>

<table>
    <thead>
        <tr>
            <th>ACTEUR</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $detailActeur) { ?>
                <tr>
                    <td><a href="index.php?action=detailActeurs&id=<?=$detailActeur["id_personne"]?>"><?= $detailActeur["identite"]?></a></td>
                    <td><?= $detailActeur["date"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";