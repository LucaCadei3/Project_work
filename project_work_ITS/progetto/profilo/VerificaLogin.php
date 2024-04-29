<?php
session_start();

include('../config.php');
include("../connessione_db.php");

// Verifica della connessione
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

// Prendi i valori inviati dal form
$email = $_POST['email'];
$password = MD5($_POST['password']);

// Query per verificare le credenziali
$sql = "SELECT * FROM utente WHERE email = '$email' AND password = '$password'";

$email = null;
$password = null;
$id = null;

if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $password = $row['password'];
            $id = $row['IDUtente'];
        }
    } else {
        $_SESSION['password_error'] = "Nome utente o password errati";
        header("Location: Profilo.php");
        exit();
    }
}

if ($email != NULL && $password != NULL && $id != NULL) {
    // Recupera il nome dell'utente
    $sql_nome = "SELECT nome FROM utente WHERE IDUtente = '$id'";
    $result_nome = $connessione->query($sql_nome);
    
    if ($result_nome->num_rows > 0) {
        $row_nome = $result_nome->fetch_assoc();
        $nome = $row_nome['nome'];
        
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['key'] = true;
        
        echo "ID utente impostato nella sessione: " . $_SESSION['id']; // debug
        echo "Nome utente impostato nella sessione: " . $_SESSION['nome']; // debug
        
        header("Location:privato/Parte_privata.php");
        exit(); // Assicura che lo script si interrompa dopo il reindirizzamento
    }
} else {
    echo "Errore: ID utente non disponibile."; // debug
}

$connessione->close();
?>
