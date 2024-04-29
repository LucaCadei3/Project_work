<?php
session_start(); // Assicurati che la sessione sia avviata

include("../../../config.php");
include("../../../connessione_db.php");

if(isset($_SESSION['id'])) {
    $id_utente = $_SESSION['id'];
    echo "ID utente recuperato dalla sessione: ".$id_utente; // debug
} else {
    // Se l'ID utente non è presente nella sessione, mostra un alert e interrompi l'esecuzione
    echo "<script>alert('ID utente non disponibile.'); history.back();</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se è stato inviato un commento
    if(isset($_POST['commento'])) {
        $commento = $_POST['commento'];
    } else {
        // Se non è stato inviato un commento, mostra un alert e interrompi l'esecuzione
        echo "<script>alert('Non hai inserito alcun commento.'); history.back();</script>";
        exit;
    }

    // Verifica se è stato inviato il nome del rifugio
    if(isset($_POST['rifugio'])) {
        $nome_rifugio = $_POST['rifugio'];

        echo "<br>Nome del rifugio: ".$nome_rifugio; // debug

        // Query per recuperare l'ID del rifugio dal nome
        $query_id_rifugio = "SELECT IDRifugio FROM rifugi WHERE NomeRifugio = '$nome_rifugio'";
        $result_id_rifugio = $connessione->query($query_id_rifugio);

        if ($result_id_rifugio->num_rows > 0) {
            // Ottieni l'ID del rifugio
            $row = $result_id_rifugio->fetch_assoc();
            $id_rifugio = $row['IDRifugio'];

            echo "<br>Id del rifugio: ".$id_rifugio; //debug

            // Inserisci la recensione nel database
            $sql2 = "INSERT INTO recensioni (Recensione, Utente, Rifugio) VALUES('$commento', $id_utente, '$id_rifugio')";
            $res = $connessione->query($sql2);

            if ($res) {
                // Reindirizza l'utente alla pagina di conferma
                header("Location: conferma_inserimento.php");
                exit; // Assicurati di terminare l'esecuzione dello script dopo il reindirizzamento
            } else {
                // Mostra un alert di errore con il messaggio di errore specifico
                echo "<script>alert('Si è verificato un errore durante l'inserimento della recensione: " . $connessione->error . "'); history.back();</script>";
            }

        } else {
            // Se non viene trovato alcun ID del rifugio corrispondente al nome, mostra un alert e interrompi l'esecuzione
            echo "<script>alert('Errore: Nessun ID del rifugio trovato per il nome specificato.'); history.back();</script>";
            exit;
        }
    } else {
        // Se non è stato inviato il nome del rifugio, mostra un alert e interrompi l'esecuzione
        echo "<script>alert('Il nome del rifugio non è stato fornito.'); history.back();</script>";
        exit;
    }

} else {
    // Se non è una richiesta POST, interrompi l'esecuzione
    echo "<script>alert('Errore: Questo script può essere eseguito solo in risposta a una richiesta POST.'); history.back();</script>";
    exit;
}
?>
