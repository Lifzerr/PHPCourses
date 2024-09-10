<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>

    <form action="/PHPCourses/TP2/Thibault/" method="POST" class="form-example">
        <label for="name">Enter your name: </label>
        <input type="text" name="name"/> <br>
        <label for="age">Enter your age: </label>
        <input type="age" name="age"/> <br>
        <label for="mail">Enter your email: </label>
        <input type="mail" name="mail"/> <br>
        <label for="euros">Enter your donation: </label>
        <input type="euros" name="euros"/> <br>
        <input name="OK" type="submit" value="OK"/>
        <button name="resultats" type="submit">resultats</button>
    </form>

    <?php

    /*TP2*/
    //Exercice 1
    extract($_POST, EXTR_OVERWRITE);

    //SEULEMENT IF SUBMIT

    if (isset($_POST['resultats'])) {
        echo "<br>";
        echo calculTotalDonations();
        echo "<br>";
        echo calculMoyenneAgeUtilisateurs();
        echo "<br>";
        $tabMailDonation = getMailEtDonAmount();
        envoyerMessageEveryone($tabMailDonation);
    }

    else if (isset($_POST['OK'])) {
        echo "ok pressed";
        echo "<br>";

        if (true) {//anyValuesNone($name, $age, $mail, $euros) == false) {
            echo "valeurs correctes";
            echo "<br>";
            $data = $name . " | " . $age . " | " . $mail . " | " . $euros . "\n";
            echo $data;
    
            $fichierResultats = "resultats.txt";
            $monFichier = fopen($fichierResultats, "a");
            fwrite($monFichier, $data);
            fclose($monFichier);
    
            $fichierOuvert2 = fopen($fichierResultats, "r");
            $compteur = [];
    
            while (feof($fichierOuvert2)) {
                $content = (int) fgets($fichierOuvert2);
                array_push($compteur, $content[1]);
            }
        }
        else {
            echo "Une des valeurs est None";
        }
    }


    function anyValuesNone($a, $b, $c, $d) {
        $none = false;
        
        if ($a == " " || $b == " " || $c == " " || $d = " ") {
            echo "une des valeurs = espace";
            $none = true;
        }
        return $none;
    }

    function calculMoyenneAgeUtilisateurs() {
        $fichierResultats = "resultats.txt";
        $moyenneAge = 0;
        $nombreDonneurs = 0;
        $fileDonation = fopen($fichierResultats, "r");
        while (!(feof($fileDonation))) {
            $ligne = fgetcsv($fileDonation, 255, "|");
            if ($ligne != false) {
                $moyenneAge += (int) $ligne[1];
                $nombreDonneurs ++;
            }
        }
        fclose($fileDonation);  
        return round($moyenneAge / $nombreDonneurs, 2);
    }

    function calculTotalDonations() {
        $fichierResultats = "resultats.txt";
        $ttlDonations = 0;
        $fileDonation = fopen($fichierResultats, "r");
        while (!(feof($fileDonation))) {
            $ligne = fgetcsv($fileDonation, 255, "|");
            if ($ligne != false) {
                $ttlDonations += (int) $ligne[3];
            }
        }
        fclose($fileDonation);
        return $ttlDonations;
    }

    function getMailEtDonAmount() {
        $fichierResultats = "resultats.txt";
        $fileDonation = fopen($fichierResultats, "r");
        $tabMailDonQtt = [];
        
        while (!(feof($fileDonation))) {
            $ligne = fgetcsv($fileDonation, 255, "|");
            if ($ligne != false) {
                echo $ligne[2], $ligne[3];
                echo "<br>";
                array_push($tabMailDonQtt, [$ligne[2], $ligne[3]]);
            }
        }

        fclose($fileDonation);
        return $tabMailDonQtt;
    }

    function envoyerMessageEveryone($tabMailDon) {
        //Envoie mail -> Diapo 49
        

        $ageMoyen = calculMoyenneAgeUtilisateurs();
        $donTotal = calculTotalDonations();

        for ($i=0; $i < count($tabMailDon); $i++) { 
            echo "Age moyen : " . $ageMoyen;
            echo "     Don total : " . $donTotal;
            echo "     Adresse mail : " . $tabMailDon[$i][0];
            echo "     Montant personnel : " . $tabMailDon[$i][1];
            echo "<br>";

            $message = $ageMoyen . "<br>" . $donTotal . "<br>" . $tabMailDon[$i][1];
            //mail($tabMailDon[$i][0], "Rappel don", $message); //DANGEREUR si fausses adresses mail //Fonctionne mais erreur car port
        }
    }

    ?>
</boy>
</html>