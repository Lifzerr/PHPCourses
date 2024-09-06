<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Courses</title>
</head>
<body>
    <?php 

    //Exercice 1
    //echo "Hello World <br>";
    
    //Exercice 2
    /*$_IP_Adress = $_SERVER["REMOTE_ADDR"];
    echo $_IP_Adress;

    echo "<br>";
    $_IP_Adress_2 = "192.230.120.165";
    echo "Adresse : ", $_IP_Adress_2, " ";

    $_TabIp = "";

    for ($i=0; $i < strlen($_IP_Adress_2) ; $i++) { 
        if ($_IP_Adress_2[$i] != ".") {
            $_TabIp .= $_IP_Adress_2[$i];
        }
        else {
            break;
        }
    }

    switch ($_TabIp) {
        case $_TabIp <= '128':
            echo "(classe A)";
            break;
        
        case $_TabIp > '128' and $_TabIp < '192':
            echo "(classe B)";
            break;
        
        case $_TabIp >= '192':
            echo "(classe C)";
            break;
        
        default:
            echo "Error";
            break;
    }*/


    
    /* Exercice 3 - V1
    // Ouvrir le fichier restos.csv en mode lecture
    $file = fopen("restos.csv", "r");

    // Vérifier que le fichier est bien ouvert
    if ($file !== false) {
        // Lire chaque ligne du fichier
        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            // Afficher les informations sous le format demandé
            echo "Nom : " . $data[1] . "<br>";
            echo "Prénom : " . $data[0] . "<br>";
            echo "Restaurant : " . $data[2] . "<br>";
            // Ajouter le séparateur (HR en HTML)
            echo "<hr>";
        }
        // Fermer le fichier après lecture
        fclose($file);
    } else {
        echo "Impossible d'ouvrir le fichier.";
    }
    

    // Exercice 3 - V2
    // Ouvrir le fichier restos.csv en mode lecture
    $file = fopen("restos.csv", "r");

    // Vérifier que le fichier est bien ouvert
    if ($file !== false) {
        // Initialiser les tableaux pour les noms et prénoms
        $noms = [];
        $prenoms = [];

        // Lire chaque ligne du fichier
        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            // Stocker les prénoms et les noms dans les tableaux
            $prenoms[] = htmlspecialchars(trim($data[0]));
            $noms[] = htmlspecialchars(trim($data[1]));
        }

        // Afficher tous les prénoms sur une seule ligne
        echo "Prénoms : " . implode(", ", $prenoms) . "<br>";
        
        // Afficher tous les noms sur une seule ligne
        echo "Noms : " . implode(", ", $noms) . "<br>";

        // Fermer le fichier après lecture
        fclose($file);
    } else {
        echo "Impossible d'ouvrir le fichier.";
    }*/

    
    // Fichier contenant le compteur
    $filename = "compteur.txt";

    // Vérifier si le fichier existe, sinon on initialise à 0
    if (!file_exists($filename)) {
        file_put_contents($filename, 0);
    }

    // Lire le compteur depuis le fichier
    $compteur = (int) file_get_contents($filename);

    // Incrémenter le compteur
    $compteur++;

    // Afficher le compteur
    echo "Nombre de visites : " . $compteur;

    // Écrire le nouveau compteur dans le fichier
    file_put_contents($filename, $compteur);
    ?>

    
</body>
</html>