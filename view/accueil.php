<?php ob_start(); ?>

<p>ceci un test</p>

<?php

$titre = "accueil";
$titre_secondaire = "accueil";
$contenu = ob_get_clean();
require "view/template.php";