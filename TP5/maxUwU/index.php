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
        $newFile = trim($nomFichier) . '.php';
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
            <form id="idForm" action="' . $newFile . '" method="POST"><br>';
            for ($i=2; $i < count($tabNouvellesValeurs); $i++) { 
                $ligne = $tabNouvellesValeurs[$i];
                $HTMLScript .= '<input id="' . trim($ligne) . '" name="' . trim($ligne) . '" placeholder="Entrez votre : ' . trim($ligne) . '"> <br>';
            }
                    
        $HTMLScript = $HTMLScript . '<input type="Submit"></form> <br> </body>';
        $phpScript = "<?php
        if (\$_SERVER['REQUEST_METHOD'] == 'POST') {
            \$name = \$_POST['Nom'];
            \$firstName = \$_POST['Prenom'];
            \$age = \$_POST['Age'];
            \$email = \$_POST['Ville'];
        
            echo 'Vous avez saisi les informations suivantes : <br>
            Nom : ' . \$name . '<br> 
            Prénom : ' . \$firstName . '<br> 
            Age : ' . \$age . '<br> 
            Ville : ' . \$email . '<br>';
        } else {
            echo 'Aucune donnée n\'a été envoyée.';
        }
        ?>";
        
        $HTMLPHP = $HTMLScript . $phpScript;
        fwrite($open, $HTMLPHP);
        fclose($open); // Après avoir fermé le fichier

        echo '<a href= '. $newFile . '> Lien vers la page </a>'

?>
</body>
</html>