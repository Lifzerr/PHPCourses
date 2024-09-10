<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Image Générée</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>

<?php 
    $largeur = 400;
    $hauteur = 600;
    $nombreIndicesBD = 60;
    $idImage = ImageCreateTrueColor($largeur, $hauteur); // On crée une image de 400*600 et on stocke son id dans $idImage

    $bdd = 'bourse'; // Base de données
    $host = 'localhost'; // Lien d'accès
    $user = 'root'; // Utilisateur
    $pass = ''; // Mot de passe bd
    $nomTable = 'bourse'; // Nom de la table

    echo 'Tentative de connexion à la base de données <br>';

    $link = mysqli_connect($host, $user, $pass, $bdd) or die ('Impossible de se connecter à la base de données');

    $query = 'SELECT * FROM bourse';
    $result = mysqli_query($link, $query);

    if (mysqli_connect_errno()) {
        echo 'Fail to connect to MySQL : ' . mysqli_connect_error();
        exit();
    }

    $couleurBackground = imagecolorallocate($idImage, 255, 128, 0); //Orange 
    imageFill($idImage, 0, 0, $couleurBackground);

    // Variables sur les lignes et colonnes
    $nombreDeLignes = mysqli_num_rows($result);
    $pixelParLigne = round($largeur / $nombreDeLignes);
    $pixelParColonne = round($hauteur / $nombreIndicesBD);
    echo 'Pixel par ligne : ' . $pixelParLigne . '<br>';
    echo 'Pixel par colonne : ' . $pixelParColonne . '<br>';

    // Variables sur les valeurs de début et fin
    $xDebut = 0;
    $xFin = 0;
    $yDebut = 0;
    $yFin = 0;

    while ($donnees = mysqli_fetch_assoc($result)) {
        $ch1 = $donnees['indice'];
        $ch2 = $donnees['ville'];

        $yFin = round($pixelParColonne * $ch1, 0);
        $xFin += $pixelParLigne;

        $xHautGauche = $xDebut;
        $yHautGauche = $hauteur - $yDebut;
        $xBasDroite = $xFin;
        $yBasDroite = $hauteur - $yFin;

        $nomVilleIndice = $ch2 . ' - ' . $ch1;
        echo $nomVilleIndice . '<br>';

        switch ($ch2) {
            case 'NY':
                $couleur = imagecolorallocate($idImage, 255, 0, 0); // Rouge
                break;

            case 'Paris':
                $couleur = imagecolorallocate($idImage, 0, 255, 0); // Vert
                break;

            case 'Tokyo':
                $couleur = imagecolorallocate($idImage, 255, 255, 255); // Noir
                break;

            case 'Bordeaux':
                $couleur = imagecolorallocate($idImage, 0, 0, 0); // Blanc
                break;

            case 'Aveyron':
                $couleur = imagecolorallocate($idImage, 125, 125, 0); // Jaune
                break;

            case 'Bazas':
                $couleur = imagecolorallocate($idImage, 0, 125, 125); // Cyan
                break;
            
            default:
                $couleur = imagecolorallocate($idImage, 125, 0, 125); // Violet
                break;
        }

        imageFilledRectangle($idImage, $xHautGauche, $yHautGauche, $xBasDroite, $yBasDroite, $couleur);

        $couleurEcriture = imagecolorallocate($idImage, 0, 0, 0); // Noir
        imageStringUp($idImage, 3, $xHautGauche + 15, $yBasDroite - 20, $nomVilleIndice, $couleurEcriture);
        $xDebut = $xFin;
    }    

    // Sauvegarde de l'image
    $fichier = 'Images/Vignettes/image.jpeg';
    if (!file_exists('Images/Vignettes')) {
        mkdir('Images/Vignettes', 0777, true); // Création du répertoire si nécessaire
    }

    imageJpeg($idImage, $fichier); // On sauvegarde l'image
    mysqli_close($link); // On ferme la base de données
    ImageDestroy($idImage); // On détruit l'image pour récupérer de l'espace
?>

<!-- Affichage de l'image sauvegardée -->
<img src="Images/Vignettes/image.jpeg" alt="Image générée" />

</body>
</html>
