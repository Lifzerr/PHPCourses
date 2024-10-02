<?php

// Fonction de connexion à la base de données
function connectToDB(){
    $bdd = "roose"; // Base de données
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "roose"; // Utilisateur
    $pass = "roose"; // Mot de passe
    global $nomtable; 
    $nomtable = "bourse"; // Nom de la table
    
    // Connexion à la base de données
    global $link; 
    $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la base de données");
}

?>
