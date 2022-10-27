<?php ob_start(); ?>
<?php $detailGenres = $requete->fetch();?>

<div class="aside">
    <div>
        <h1><?= $detailGenres["nom_genre"] ?></h1>           
    </div>
    
    <table>
        <thead>
            <tr>
                <th>NOM</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requete2->fetchAll() as $cast) { ?>
            <tr>
                <td><?= $cast["titre"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php

$titre = "Détail du Genre";
$titre_secondaire = "GENRE";
$contenu = ob_get_clean();
require "view/template.php";