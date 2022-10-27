<?php ob_start(); ?>

<p>il y a <?= $requete->rowCount() ?> roles</p>

<table>
    <thead>
        <tr>
            <th>ROLE</th>
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

$titre = "Liste de role";
$titre_secondaire = "Liste de role";
$contenu = ob_get_clean();
require "view/template.php";