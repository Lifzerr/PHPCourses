<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <?php

    /*TP1*/
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

    //Exercice 3
    /*$fileName = "restos.csv";
    $openMode = "r";
    
    $myFile = fopen($fileName, $openMode);

    if (!($myFile)) {
        echo "Erreur lors de l'ouverture du fichier";
        exit;
    }

    $tabNoms = [];
    $tabPrenoms = [];
    $tabRestaurants = [];

    while (!(feof($myFile))) {
        $ligne = fgetcsv($myFile, 255, ";");
        echo "Prénom : ", $ligne[0], "<br>";
        echo "Nom : ", $ligne[1], "<br>";
        echo "Restaurant : ", $ligne[2], "<br>";
        echo "<hr>";
    }

    fclose($myFile);*/

    //Exercice 4
    //Solution simple
    /*
    $fileToOpen = "compteur.txt";

    $compteur = (int) file_get_contents($fileToOpen);
    $compteur ++;

    file_put_contents($fileToOpen, $compteur);
    echo $compteur;*/

    //Solution "difficile"
    
    $fileToOpen = "compteur.txt";
    $myFile = fopen($fileToOpen, "r+");

    $compteur2 = (int) fgets($myFile);
    $compteur2 ++;
    echo $compteur2;

    rewind($myFile);
    ftruncate($myFile, 0);
    fwrite($myFile, (string) $compteur2);
    fclose($myFile);

    ?>
</boy>
</html>