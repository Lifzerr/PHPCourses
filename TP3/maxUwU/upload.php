<?php

$uploadCount = 0;

if(isset($_POST['uploadCount'])) {
    $uploadCount = $_POST['uploadCount'];
    
    echo "<form action='upload.php' method='post' enctype='multipart/form-data'>";
    for($i = 0; $i < $uploadCount; $i++)
    {
        echo "<input type='file' name='file$i' id='file$i' required><br>";
    }
    echo "  <input type='submit' value='Upload'>
            </form>";
}

// Récupérer les images uploadées et les mettre dans ./uploads
if (isset($_POST['file*'])) {
    $uploadDir = './uploads/';

    // Vérifier si le dossier existe
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
}


