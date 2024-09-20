<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        // Path + ouverture + tab
        $filepath = 'config.ini';
        $data = fopen($filepath, "r");
        $tabNouvellesValeurs = [];

        // Récupération des valuers 
        while(!feof($data)){
            $ligne = fgets($data, 255);
            if ($ligne[0] != '[') {
                array_push($tabNouvellesValeurs, $ligne);
            }
        }

        for ($i=0; $i < count($tabNouvellesValeurs); $i++) { 
            echo $tabNouvellesValeurs[$i];
        }

        // Récupérer les infos 
        $nomFichier = $tabNouvellesValeurs[0];
        $newFile = trim($nomFichier) . '.html';
        echo $newFile . '<br>';

        $nbrDonnees = $tabNouvellesValeurs[1];
        echo '<br>' . $nbrDonnees;

        /********  Nouveau fichier HTML  ********/
        $open = fopen($newFile,'w+');

        // Ecrire dans le fichier
        $HTMLScript = '
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $nomFichier .'</title>
</head>
<body>
        <form id="idForm"><br>';
        for ($i=2; $i < count($tabNouvellesValeurs) ; $i++) { 
            $ligne = $tabNouvellesValeurs[$i];
            $HTMLScript = $HTMLScript . '<input id="' . trim($ligne) . '"placeholder="Entrez votre : ' . trim($ligne) .'"> \n';
        }
        $HTMLScript = $HTMLScript . '</form> <br> </body>';
        fwrite($open, $HTMLScript);
        fclose($open);



?>
</body>
</html>