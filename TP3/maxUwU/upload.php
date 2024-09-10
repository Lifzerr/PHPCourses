<?php

$uploadCount = 0;

// Première étape : génération du formulaire
if(isset($_POST['uploadCount'])) {
    $uploadCount = $_POST['uploadCount'];
    
    echo "<form action='upload.php' method='post' enctype='multipart/form-data'>";
    // Passer le nombre de fichiers via un champ caché
    echo "<input type='hidden' name='uploadCount' value='$uploadCount'>";
    
    // Générer les champs de fichier
    for($i = 0; $i < $uploadCount; $i++) {
        echo "<input type='file' name='file$i' id='file$i' required><br>";
    }
    echo "<input type='submit' value='Upload' name='Envoyer'>";
    echo "</form>";
}

// Deuxième étape : traitement des fichiers uploadés
if(isset($_POST['Envoyer'])){
    $uploadCount = $_POST['uploadCount']; // Récupérer le nombre de fichiers à uploader

    // Créer le dossier d'upload s'il n'existe pas
    $uploadDir = 'upload/';
    if(!is_dir($uploadDir)){
        mkdir($uploadDir, 0777, true);
    }

    // Boucler sur les fichiers uploadés
    for ($i = 0; $i < $uploadCount; $i++) { 
        $nomPhoto = 'file' . $i;

        if(isset($_FILES[$nomPhoto]) && $_FILES[$nomPhoto]['error'] == UPLOAD_ERR_OK) {
            $currentFile = $_FILES[$nomPhoto]['tmp_name'];
            $filename = basename($_FILES[$nomPhoto]['name']);

            // Déplacer le fichier uploadé dans le dossier de destination
            if(move_uploaded_file($currentFile, $uploadDir . $filename)) {
                echo "Photo $i : $filename uploadée avec succès.<br>";
            } else {
                echo "Erreur lors de l'upload de la photo $i.<br>";
            }
        } else {
            echo "Erreur avec la photo $i.<br>";
        }
    }
}
?>