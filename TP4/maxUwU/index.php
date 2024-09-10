<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $bdd= "roose"; // Base de données
        $host= "lakartxela.iutbayonne.univ-pau.fr";
        $user= "roose"; // Utilisateur
        $pass= "roose"; // mp
        $nomtable= "bourse"; /* Connection bdd */

        $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");

        $requete = "SELECT * FROM $nomtable";
        $resultat = mysqli_query($link, $requete);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        header('Content-type : image/jpeg');
        $numberRows = mysqli_num_rows($resultat);
        $largeur = 400;
        $hauteur = 600;
        $nbIndicesBD = 60;

        $lineWidth = ($largeur - 4)/ $numberRows;

        $image = ImageCreateTrueColor($largeur, $hauteur);
        
        // Parcours des résultats
        while($data = mysqli_fetch_assoc($resultat))
        {
            $indice = $data['indice'];
            $ville = $data['ville'];

            

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

            echo $ville . '  ' . $indice . '<br>'; 
        }

        mysqli_close($link);
        ImageDestroy($image);

    ?>
</body>
</html>