<?php
    session_start(); // Assicurati che la sessione sia avviata

    include("../../../config.php");
    include("../../../connessione_db.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_recensione'])) {
        $id_recensione = (int)$_POST['id_recensione'];  // Assicurati che l'ID sia un intero

        if (isset($_POST['elimina_recensione'])) {
            $sql = "DELETE FROM recensioni WHERE ID_Recensione = $id_recensione";
            
            if (!mysqli_query($connessione, $sql)) {
                echo "Errore nella query di eliminazione: " . mysqli_error($connessione);
            } else {
                echo "<script>alert('Recensione eliminata con successo.'); window.location.reload();</script>";
            }
        }

        if (isset($_POST['modifica_recensione'])) {
            $nuova_recensione = mysqli_real_escape_string($connessione, $_POST['nuova_recensione']);
            $sql = "UPDATE recensioni SET Recensione = '$nuova_recensione' WHERE IDRecensione = $id_recensione";
            
            if (!mysqli_query($connessione, $sql)) {
                echo "Errore nella query di modifica: " . mysqli_error($connessione);
            } else {
                echo "<script>alert('Recensione modificata con successo.'); window.location.reload();</script>";
            }
        }
    }
?>

<html>
<head>
    <title>Diario</title><br>
    <h1>Il mio diario</h1>
    <link rel="stylesheet" href="../../../css.css"/>
</head>
<body>
    <div class="divTesto">
        <div class="topnav">
            <a href="../../../index.php">Home</a>
            <a style="float: right" href="../../Profilo.php">Log-out</a>
            <a style="float: right" href="../Parte_privata.php">Profilo</a>
            <a style="float: right" href="../../../Info.html">Info</a>
            <div class="dropdown">
                <button class="dropbtn">Province</button>
                <div class="dropdown-content">
                    <a href="../../../Bergamo/Bergamo.php">Bergamo</a>
                    <a href="../../../Brescia/Brescia.php">Brescia</a>
                    <a href="../../../Lecco_Como/Lecco-Como.php">Lecco Como</a>
                    <a href="../../../Sondrio/Sondrio.php">Sondrio</a>
                </div>
            </div>
            <a style = "float: right" href="../../../Home.php">Attrezzatura</a>
        </div>
        <br>
        <div class="sezione"><br>
            <form id="rifugioForm" method="post" action="Elenco_rifugi.php">
                <label for="rifugio">Scegli il rifugio che vuoi recensire:</label>
                <select id="rifugio" name="rifugio">
                    <option>SELEZIONA RIFUGIO</option>
                    <?php
                        $sql = "SELECT NomeRifugio FROM rifugi";
                        $result = mysqli_query($connessione, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=\"".$row["NomeRifugio"]."\">".$row["NomeRifugio"]."</option>";
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </select>
            </form>
        </div>
        <br>
        <div class="sezione"><br>
            <p>
                <?php
                    if(isset($_SESSION['id'])) {
                        $id_utente = $_SESSION['id'];
                        
                        // Query per selezionare le recensioni dell'utente corrente
                        $sql_recensioni = "SELECT rec.ID_Recensione, r.NomeRifugio, rec.Recensione 
                                        FROM recensioni rec 
                                        INNER JOIN rifugi r ON rec.Rifugio = r.IDRifugio 
                                        WHERE rec.Utente = $id_utente";
                        
                        echo "Le tue recensioni: ";
                        
                        $result_recensioni = mysqli_query($connessione, $sql_recensioni);
                        
                        if (!$result_recensioni) {
                            echo "Errore nella query: " . mysqli_error($connessione);
                        } elseif (mysqli_num_rows($result_recensioni) > 0) {
                            while($row = mysqli_fetch_assoc($result_recensioni)) {
                                echo '<div class="recensione_privata">';
                                echo '<h3>Rifugio: ' . $row["NomeRifugio"] . '</h3>';
                                echo '<p class = "testo_recensione">Recensione: ' . $row["Recensione"] . '</p>';
                                echo '<center>';
                                echo '<div class="pulsanti_recensione">';
                                // Eliminazione della recensione
                                echo '<form action="Elimina_recensione.php" method="post">';
                                echo '<input type="hidden" name="id_recensione" value="' . (int)$row["ID_Recensione"] . '">';
                                echo '<input type="submit" name="elimina_recensione" value="Elimina recensione" class="elimina_recensioni_privati">';
                                echo '</form>';
                                
                                // Modifica della recensione
                                echo '<form action="Modifica_recensione.php" method="post">';
                                echo '<input type="hidden" name="id_recensione" value="' . (int)$row["ID_Recensione"] . '">';
                                echo '<label for="nuova_recensione">Nuova recensione:</label><br>';
                                echo '<textarea name="nuova_recensione" id="nuova_recensione" rows="4" cols="50"></textarea><br>';
                                echo '<input type="submit" name="modifica_recensione" value="Modifica recensione" class="modifica_recensioni_privati">';
                                echo '</form>';
                                
                                echo '</div></center><br></div><br>';
                            }
                        } else {
                            echo "Nessuna recensione trovata.";
                        }
                        
                    } else {
                        // Se l'ID utente non è presente nella sessione, mostra un alert e interrompi l'esecuzione
                        echo "<script>alert('ID utente non disponibile.'); history.back();</script>";
                    }
                ?>
            </p>
            <br>
        </div>
    </div>

    <script>
        document.getElementById('rifugio').addEventListener('change', function() {
            document.getElementById('rifugioForm').submit();
        });
    </script>
</body>
</html>
