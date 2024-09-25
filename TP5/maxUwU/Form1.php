
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Form1
</title>
            </head>
            <body>
            <form id="idForm" action="Form1.php" method="POST"><br><input id="Nom" name="Nom" placeholder="Entrez votre : Nom"> <br><input id="Prenom" name="Prenom" placeholder="Entrez votre : Prenom"> <br><input id="Age" name="Age" placeholder="Entrez votre : Age"> <br><input id="Ville" name="Ville" placeholder="Entrez votre : Ville"> <br><input type="Submit"></form> <br> </body><?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['Nom'];
            $firstName = $_POST['Prenom'];
            $age = $_POST['Age'];
            $email = $_POST['Ville'];
        
            echo 'Vous avez saisi les informations suivantes : <br>
            Nom : ' . $name . '<br> 
            Prénom : ' . $firstName . '<br> 
            Age : ' . $age . '<br> 
            Ville : ' . $email . '<br>';
        } else {
            echo 'Aucune donnée n\'a été envoyée.';
        }
        ?>