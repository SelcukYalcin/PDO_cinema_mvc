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
            foreach ($requete->fetchAll() as $role) { ?>
                <tr>
                    <td><?= $role["nom_role"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste de role";
$titre_secondaire = "Liste de role";
$contenu = ob_get_clean();
require "view/template.php";