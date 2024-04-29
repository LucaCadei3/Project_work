<?php
    //Config File
    include("../config.php");
    include("../connessione_db.php");

    /*------------------------------------------------------
                        REGISTER
    -------------------------------------------------------*/
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    //Controllo se l'utente non è già nel database
    $q = $dbh->prepare("SELECT * FROM utente WHERE email = :username");
    $q->bindParam(':username', $username);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $q->rowCount();
    if ($rows > 0) {
        header("location: Registrazione.html?error=Email gia' registrata!");
        die();
    }

    //Insert new user in DB
    $password = md5($password);
    $q = $dbh->prepare("INSERT INTO utente (email, password, nome, cognome) 
        VALUES (
        :username,  
        :password,
        :nome,
        :cognome
        )");
    $q->bindParam(':username', $username);
    $q->bindParam(':password', $password);
    $q->bindParam(':nome', $nome);
    $q->bindParam(':cognome', $cognome);
    $res = $q->execute();

    if ($res) {
        $last_id = $dbh->lastInsertId();  // Ottiene l'ID dell'ultimo record inserito
        $q = $dbh->prepare("SELECT nome FROM utente WHERE IDUtente = :id");
        $q->bindParam(':id', $last_id);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        $nome_utente = $row['nome'];

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['nome'] = $nome_utente;
        $_SESSION['key'] = true;

        header("location: privato/Parte_privata.php?user=yes");
    } else {
        header("location: Registrazione.html?error=" . $dbh->errorInfo()[2]);
    }
?>
