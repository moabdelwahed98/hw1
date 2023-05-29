<?php
    /*******************************************************
        Controlla che i l'email sia unica
    ********************************************************/
    require_once 'dbconfig.php';
    
    // Controllo che l'accesso sia legittimo
    if (!isset($_GET["q"])) {
        exit;
    }

    // Imposto l'header della risposta
    header('Content-Type: application/json');
    
    // Connessione al DB
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    // Leggo la stringa dell'email
    $email = mysqli_real_escape_string($conn, $_GET["q"]);

    // Costruisco la query
    $query = "SELECT email FROM users WHERE email = '$email'";

    // Eseguo la query
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Torna un JSON con chiave exists e valore boolean
    $json_array = (array('exists' => mysqli_num_rows($res) > 0 ? true : false));
    $json = json_encode($json_array);
    echo $json;

    // Chiudo la connessione
    mysqli_close($conn);
?>