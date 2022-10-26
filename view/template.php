<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public\CSS\style.css" rel="stylesheet"/>
    <title>$titre</title>
</head>
<body>
    <nav> 
        <ul>
           <li> <a href="index.php">ACCUEIL</a></li> 
           <li> <a href="index.php?action=listFilms.php">FILMS</a></li> 
           <li> <a href="index.php?action=listActeurs">ACTEURS</a></li>
           <li> <a href="index.php?action=listRealisateurs">REALISATEURS</a> </li>
           <li> <a href="index.php?action=listGenre.php">GENRE</a></li>
           <li> <a href="index.php?action=listRoles.php">ROLES</a></li> 
        </ul>
    </nav>
    <div id="contenu">
        <h1 >PDO CINEMA</h1>
        <h2 ><?= $titre_secondaire ?></h2>
        <?= $contenu ?>
    </div>
    
</body>
</html>