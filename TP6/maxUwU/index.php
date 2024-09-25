


<?php

    $xmlContent = <<<XML
    <?xml version="1.0" encoding="ISO-8859-1" ?>
    <continents>
        <europe>
            <pays>France</pays>
            <pays>Belgique</pays>
            <pays>Espagne</pays>
        </europe>
        <asie>
            <pays>Japon</pays>
            <pays>Inde</pays>
        </asie>
    </continents>
    XML;

    // Charger le contenu XML dans DOMDocument
    $dom = new DOMDocument();
    $dom->loadXML($xmlContent);

    // 1. Lister tous les pays
    echo '<h1>Tous les pays</h1>';
    $paysList = $dom->getElementsByTagName('pays');
    foreach ($paysList as $pays) {
        echo $pays->nodeValue . '<br>';
    }


    // 2. Lister uniquement les pays européens
    echo '<h1>Pays Européens</h1>';
    $europe = $dom->getElementsByTagName('europe')->item(0);
    if ($europe) {
        $europePays = $europe->getElementsByTagName('pays');
        foreach ($europePays as $pays) {
            echo $pays->nodeValue . '<br>';
        }
    } else {
        echo 'Aucun pays européen trouvé.';
}

?>