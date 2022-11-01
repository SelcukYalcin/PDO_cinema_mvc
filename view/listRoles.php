<?php ob_start(); ?>


<table>
    <thead>
        <tr>
            <th>ROLE (<?= $requete->rowCount() ?>)</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $detailRoles) { ?>
                <tr>
                    <td><a href="index.php?action=detailRoles&id=<?= $detailRoles["id_role"] ?>"><?= $detailRoles["nom_role"] ?></a></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des roles";
$titre_secondaire = "ROLES";
$contenu = ob_get_clean();
require "view/template.php";