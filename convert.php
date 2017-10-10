<?php

include('config.php');
$pdo = connect();

$result = 'SELECT * FROM ma_table';
$query = $bdd->prepare($result);
$query->execute();
$list = $query->fetchAll();

foreach ($list as $o) {
    $geocoder = "https://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false&key=YOUR_KEY_HERE";

    $adresse = $o['adresse'];
    $adresse .= ', ' . $o['ville'];
    $id_adresse = $o['id'];

    // Requête envoyée à l'API Geocoding
    $query = sprintf($geocoder, urlencode(utf8_encode($adresse)));

    $result = file_get_contents($query);
    $json = json_decode($result, true);

    if (empty($o['latitude']) || empty($o['longitude'] || $o['longitude'] == 0 || $o['latitude'] == 0)) {
        if ($json['status'] == 'OK') {
            sleep(1);
            $lat = $json['results'][0]['geometry']['location']['lat'];
            $lat = str_replace(',', '.', $lat);
            $lng = $json['results'][0]['geometry']['location']['lng'];
            $lng = str_replace(',', '.', $lng);
            $formatted_address = $json['results'][0]['formatted_address'];

            // verify if data is complete
            if ($lat && $lng && $formatted_address) {
                $req = $bdd->prepare("UPDATE ma_table SET `latitude` = $lat, `longitude` = $lng WHERE `id` = $id_adresse") or die($pdo->errorInfo());
                $req->execute();

                echo "\n" . $o['adresse'] . " " . $o['ville'];
            } else {
                echo 'error adresse';
            }
        } else {
            echo 'error statut';
        }
    }
}


