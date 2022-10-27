<?php ob_start(); ?>
<?php $detailRoles = $requete->fetch();?>

<div class="aside">
    <div>
        <h1><?= $detailRoles["nom_role"] ?></h1>           
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
                    <td><?= $cast["acteur"] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
