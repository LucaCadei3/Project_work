<?php
    //generali
    
    $sito_internet = "Busetti_Cadei";
    
    $data =(date("d-m-y"));
    
    $vers = "2.0";
    
    //URL PER HTACCESS
    
    $base_url = "http://localhost/rifugi_finito.sql";
    
    //connessione DB
    
    $host = "localhost";
    
    $db_user = "Luca";
    
    $db_psw = "root";
    
    $db_name = "rifugi";

    try {
        $dbh = new PDO("mysql:=$host;dbname=$db_name", $db_user, $db_psw);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    header('Content-Type: text/html; charset=ISO-8859-1');

?>