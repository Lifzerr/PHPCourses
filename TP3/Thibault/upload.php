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

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['number'])) {
        $nbPhotos = (int)$_POST['number']; // Get the number of photos from the form
    
        if ($nbPhotos > 0) {
            echo '<form enctype="multipart/form-data" action="upload.php" method="POST">';
            echo '<input type="hidden" name="nbphotos" value="' . $nbPhotos . '">';
    
            // Generate file input fields dynamically
            for ($i = 1; $i <= $nbPhotos; $i++) {
                echo '<input type="file" name="photo' . $i . '"><br>'; //on génère le code html
            }
    
            echo '<input type="submit" value="Télécharger">';
            echo '</form>';
        } else {
            echo "Veuillez saisir un nombre valide de photos à télécharger.";
        }
    } if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nbphotos'])) {
        // This block handles the photo uploads
        $uploadDir = 'upload/'; //Le dossier dans lequel on veut télécherger les fichiers
        $nbPhotos = (int)$_POST['nbphotos']; //On récupère le nombre de photos stockées dans le hidden
    
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); //Création du dossier si inexistant
        }
    
        for ($i = 1; $i <= $nbPhotos; $i++) { //Boucle sur tous les fichiers
            $photoKey = 'photo' . $i;
            if (isset($_FILES[$photoKey]) && $_FILES[$photoKey]['error'] == UPLOAD_ERR_OK) { //Si on a appuyé sur bouton téléchargement et pas d'erreurs
                $tmpName = $_FILES[$photoKey]['tmp_name']; //On reprend le nom de notre fichier stocké sur le serveur
                $fileName = basename($_FILES[$photoKey]['name']); //On récup le nom du fichier de base du serveur
                move_uploaded_file($tmpName, $uploadDir . $fileName); //On upoload le fichier dans notre dossier
                echo "Photo $i téléchargée avec succès.<br>";
            } else {
                echo "Erreur lors de l'upload de la photo $i.<br>";
            }
        }
    }

    ?>

</boy>
</html>