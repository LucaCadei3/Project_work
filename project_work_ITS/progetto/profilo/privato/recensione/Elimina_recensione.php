<?php
    session_start(); // Assicurati che la sessione sia avviata

    include("../../../config.php");
    include("../../../connessione_db.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_recensione'])) {
        $id_recensione = (int)$_POST['id_recensione'];  // Assicurati che l'ID sia un intero

        $sql = "DELETE FROM recensioni WHERE ID_Recensione = $id_recensione";
        
        if (!mysqli_query($connessione, $sql)) {
            echo "Errore nella query di eliminazione: " . mysqli_error($connessione);
        } else {
            echo "<script>window.location.href = 'Diario.php';</script>";
        }
    } else {
        echo "<script>alert('ID recensione non disponibile.'); history.back();</script>";
    }
?>
