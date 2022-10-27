<?php ob_start(); ?>

<?php
$detailRealisateurs = $requete->fetch();
?>

<div class="aside">
    <div>
        <h1><?= $detailRealisateurs["identite"] ?></h1>
                <p>sexe : <?= $detailRealisateurs["sexe"] ?></p>
                <p>Date de naissance : <?= $detailRealisateurs["date"] ?></p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>ANNEE DE SORTIE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requete2->fetchAll() as $casting) { ?>
            <tr>
                <td><?= $casting["titre"] ?></td>
                <td><?= $casting["anneeSortie"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$titre = "info réalisateur";
$titre_secondaire = "Filmographie";
$contenu = ob_get_clean();
require "view/template.php";