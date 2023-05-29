<?php

    header('Content-Type: application/json');

    function store(){

        $url = 'https://fakestoreapi.com/products';

        # Creo il CURL handle per l'URL selezionato
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        # Setto che voglio ritornato il valore, anziché un boolean (default)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Eseguo la richiesta all'URL
        $res = curl_exec($ch);
        # Vedo se non è andata a buon fine la richiesta dei dati
        $err = curl_error($curl);
        # Libero le risorse
        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($res, true);
        }
        $newJson = array();
        #riformatto array
        for ($i = 0; $i < count($json['results']); $i++) {
            $newJson[] = array('id' => $json['results'][$i]['id'], 'preview' => $json['results'][$i]['urls']['small'], 'height' => $json['results'][$i]['height'], 'width' => $json['results'][$i]['width']);
        }
        echo json_encode($newJson);
    }

store();

?>


