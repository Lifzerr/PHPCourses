<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2</title>
</head>
<body>
    <form method='POST' action='index.php'>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="donation">Donation Amount:</label>
        <input type="number" id="donation" name="donation" required><br>

        <input type="submit" value="Submit">
        
    </form>

    <form method='POST' action='index.php'>
        <input type="submit" name="result" value="Résultat">
    </form>

    <?php
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            extract($_POST, EXTR_OVERWRITE);

            $data = "Name: $name | Age: $age | Email: $email | Donation Amount: $donation\n";

            if(!file_exists("resultats.txt")) {
                file_put_contents("resultats.txt", $data);
            } else {
                file_put_contents("resultats.txt", $data, FILE_APPEND);
            }
        }

        // Afficher le contenu du fichier
        $file = fopen("resultats.txt", "r");

        if ($file !== false) {
            while (($line = fgets($file)) !== false) {
                echo $line . "<br>";
            }
        }
        fclose($file);

        /*
        // Fonction de mail
        if (isset($_POST['result'])) {
            $file = fopen("resultats.txt", "r");

            if ($file !== false) {
                while (($line = fgets($file)) !== false) {
                    $data = explode(" | ", $line);
                    $name = explode(": ", $data[0])[1];
                    $age = explode(": ", $data[1])[1];
                    $email = explode(": ", $data[2])[1];
                    $donation = explode(": ", $data[3])[1];

                    $subject = "Donation";
                    $message = "Cher $name,\nThankvous avez donné $donation$ à notre organisation.\nMerci beaucoup pour votre générosité!";
                    $headers = "From: server";

                    mail($email, $subject, $message, $headers);
                }
            }
            fclose($file);
        }
        */
    ?>
</body>
</html>