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
    //header("Content-type: image/jpeg"); //On indique au navigateur qu'on veut une image jpeg
    $largeur = 400;
    $hauteur = 600;
    //$idImage = ImageCreate($largeur, $hauteur); //On créé une image de 400*600 et on stocke son id dans $idImage

    $bdd = 'bourse'; //Base de données
    $host = 'localhost'; //Lien d'accès
    $user = 'root'; //Utilisateur
    $pass = ''; //Mot de passe bd
    $nomTable = 'bourse'; //Nom de la table

    echo 'Tentative de connexion à la base de données <br>';

    $link = mysqli_connect($host, $user, $pass, $bdd) or die ('Impossible de se connecyter à la base de données');

    $query = 'SELECT * FROM bourse';
    $result = mysqli_query($link, $query);

    if (mysqli_connect_errno()) {
        echo 'Fail to connext to MySQL : ' . mysqli_connect_error();
        exit();
    }

    while ($donnees = mysqli_fetch_assoc($result)) {
        $ch1 = $donnees['indice'];
        $ch2 = $donnees['ville'];
        echo $ch1 . '   ' . $ch2 . '<br>';
    }

    $pixelParLigne = round($hauteur / mysqli_num_rows($result), 2);
    echo 'Pixel par ligne : ' . $pixelParLigne . '<br>';
    

    mysqli_close($link); //On close la bd pour libérer l'espace
    //ImageDestroy($idImage); //On détruit l'image pour récupérer de l'espace

    ?>

</boy>
</html>