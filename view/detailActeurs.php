<?php

$detailActeurs = $requete->fetch();

?>

<div class="aside">
    <div>
        <h1><?= $detailActeurs["identite"] ?></h1>           
            <p>sexe : <?= $detailActeurs["sexe"] ?></p>
            <p>Date de naissance : <?= $detailActeurs["date"] ?></p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>ANNEE DE SORTIE</th>
                <th>ROLE</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php foreach($requete2->fetchAll() as $cast) { ?>
            <tr>
                <td><?= $cast["titre"] ?></td>
                <td><?= $cast["anneeSortie"] ?></td>
                <td><?= $cast["nomRole"] ?></td>
            </tr> -->
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail d'acteur";
$titre_secondaire = "Filmographie";
$contenu = ob_get_clean();
require "view/template.php";