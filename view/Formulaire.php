<?php 
ob_start(); 
?>

<h2>Ajouter un role</h2>

<form action="index.php?action=addRole" method="post">
    <input type="text" name="nom_role" id="nom_role" placeholder="Ajouter un rôle" required>
    <input type="submit" name="submit" value="ajouter">
</form>

<?php
$titre = "formulaire";
$titre_secondaire = "Formulaire";
$contenu = ob_get_clean();
require "view/template.php";
?>