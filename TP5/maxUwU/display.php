<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['Nom'];
    $firstName = $_POST['Prenom'];
    $age = $_POST['Age'];
    $email = $_POST['Ville'];



    echo " Vous avez saisi les informations suivantes : \n
    Nom : " . $name . "\n Prénom : ". $firstName . "\n Age : ". $age;
}