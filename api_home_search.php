
<?php
    //ritorna risultati api unsplash

    header('Content-Type: application/json');

    function store2(){
        $query = urlencode($_GET['q']);
        $url = 'https://dummyjson.com/products/search?q='.$query;

        # Creo il CURL handle per l'URL selezionato
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        # Setto che voglio ritornato il valore, anziché un boolean (default)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Eseguo la richiesta all'URL
        $res = curl_exec($ch);
        # Impacchetto tutto in un JSON
        $json = json_decode($res, true);
        
        # Libero le risorse
        curl_close($ch);
        //se non trovo niente faccio la verifica

        $newJson = array();
        #riformatto array
        for ($i = 0; $i < count($json['results']); $i++) {
            $newJson[] = array('id' => $json['results'][$i]['id'], 'preview' => $json['results'][$i]['urls']['small'], 'height' => $json['results'][$i]['height'], 'width' => $json['results'][$i]['width']);
        }
        
        echo json_encode($newJson);
        
    }

    store2();

?>