<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\PDO_cinema_mvc\public\CSS\style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <nav> 
        <ul>
            <li> <a href="index.php">ACCUEIL</a></li> 
            <li> <a href="index.php?action=listFilms">FILMS</a></li> 
            <li> <a href="index.php?action=listActeurs">ACTEURS</a></li>
            <li> <a href="index.php?action=listRealisateurs">REALISATEURS</a> </li>
            <li> <a href="index.php?action=listGenre">GENRES</a></li>
            <li> <a href="index.php?action=listRoles">ROLES</a></li>
            <li> <a href="index.php?action=formulaire">INSERTION</a></li> 
        </ul>
    </nav>
    <main>
        <div id="contenu">
            <h2 ><?= $titre_secondaire ?></h2>
            <?= $contenu ?>
        </div>
</main>
    
</body>
</html>