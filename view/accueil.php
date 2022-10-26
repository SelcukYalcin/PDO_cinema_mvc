<?php ob_start(); ?>

<?php

$titre = "accueil";
$titre_secondaire = "accueil";
$contenu = ob_get_clean();
require "view/template.php";