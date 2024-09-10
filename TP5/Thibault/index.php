<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Génération d'un form</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>

<?php 
    $cheminFichier = 'config.ini';
    $monFichier = fopen($cheminFichier, 'r');
    $tabNouvellesValeurs = [];

    while (!(feof($monFichier))) {
        $ligne = fgets($monFichier, 255);
        if ($ligne[0] != '[') {
            array_push($tabNouvellesValeurs, $ligne);
        }
    }

    fclose($monFichier);

    $newFile = $tabNouvellesValeurs[0];
    $newFile = trim($newFile) . '.html';
    echo $newFile . '<br>';

    $nombreDonnees = $tabNouvellesValeurs[1];
    echo $nombreDonnees . '<br>';

    /********  Nouveau fichier HTML  ********/
    $open = fopen($newFile,'w+');

    $pageHtml = '<form id="idForm"> <br>';
    fwrite($open, $pageHtml);

    for ($i=0; $i < $nombreDonnees; $i++) { 
        $val = $tabNouvellesValeurs[$i+2];
        $pageHtml = '<input id="' . $val . '"placeholder="Entrez votre : ' . $val .'"> <br>';
        fwrite($open, $pageHtml);
    }

    fclose($open);
?>

</body>
</html>
