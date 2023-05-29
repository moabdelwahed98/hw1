<?php
    /********************************************************
       Controlla che l'utente sia già autenticato, per non 
       dover chiedere il login ad ogni volta               
    *********************************************************/
    //require 'dbconfig.php';
    session_start();

    function checkAuth() {
        // Se esiste già una sessione, la ritorno, altrimenti ritorno 0
        if(isset($_SESSION['ecom_user_id'])) {
            return $_SESSION['ecom_user_id'];
        } else 
            return 0;
    }
?>