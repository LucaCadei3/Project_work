<?php
    session_start(); // Assicurati che la sessione sia avviata

    include("../../../config.php");
    include("../../../connessione_db.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_recensione'])) {
        $id_recensione = (int)$_POST['id_recensione'];  // Assicurati che l'ID sia un intero

        if (isset($_POST['nuova_recensione'])) {
            $nuova_recensione = mysqli_real_escape_string($connessione, $_POST['nuova_recensione']);
            $sql = "UPDATE recensioni SET Recensione = '$nuova_recensione' WHERE ID_Recensione = $id_recensione";
            
            if (!mysqli_query($connessione, $sql)) {
                echo "Errore nella query di modifica: " . mysqli_error($connessione);
            } else {
                echo "<script>alert('Recensione modificata con successo.'); window.location.href = 'Diario.php';</script>";
            }
        } else {
            echo "<script>alert('Dati della recensione non disponibili.'); history.back();</script>";
        }
    } else {
        echo "<script>alert('ID recensione non disponibile.'); history.back();</script>";
    }
?>
