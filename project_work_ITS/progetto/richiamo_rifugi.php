<?php

header('Content-type: text/html; charset=utf-8');

// Assicurati che la connessione al database sia stata stabilita
if (!$connessione) {
    die("Connessione al database fallita: " . mysqli_connect_error());
}

$result = mysqli_query($connessione, $sql);
$num = mysqli_num_rows($result);

echo "<br><div class=\"sezione\">";
echo "Benvenuto nella pagina web pi&ugrave; informata che ci sia, qui troverai le informazioni che stai cercando.<br>";
echo "$num rifugi trovati:<br></div>";

// Array per memorizzare le recensioni di ciascun rifugio
$recensioni_rifugi = array();

// Query per recuperare tutte le recensioni
$query_recensioni = "SELECT * FROM recensioni";
$result_recensioni = mysqli_query($connessione, $query_recensioni);

while ($row_recensioni = mysqli_fetch_assoc($result_recensioni)) {
    $IDrifugio_recensione = $row_recensioni["Rifugio"];
    $recensione = $row_recensioni["Recensione"];
    $IDUtente = $row_recensioni["Utente"];
    
    // Aggiungi la recensione all'array corrispondente al rifugio
    $recensioni_rifugi[$IDrifugio_recensione][] = array(
        'recensione' => $recensione,
        'IDUtente' => $IDUtente
    );
}

while($row = mysqli_fetch_assoc($result)) {
    $IDrifugio = $row["IDRifugio"];
    $Link_mappa = $row["Mappa"];
    $Nome_rifugio = $row["NomeRifugio"];
    $Descrizione_rifugio = $row["Descrizione"];
    $Immagine = $row["Immagine"];

    echo "<br>";
    echo "<div class=\"sezione\">";
    echo "<div class=\"rifugio\" id=\"$IDrifugio\">";
    echo "<h3><a href=\"$Link_mappa\" target=\"_blank\">$Nome_rifugio</a></h3><br>";
    echo "<a href=\"$Link_mappa\" target=\"_blank\">";
    echo "<img src=\"$Immagine\" alt=\"$Nome_rifugio\" class=\"immagine\"></a>";
    echo "$Descrizione_rifugio </div>";

    echo "<div class=\"recensione\">";
    echo "<br><br><br><br><br><br><h4>Recensioni:</h4>";
    
    $count = 0;
    if(isset($recensioni_rifugi[$IDrifugio])) {
        foreach($recensioni_rifugi[$IDrifugio] as $rec) {
            $recensione = $rec['recensione'];
            $IDUtente = $rec['IDUtente'];

            // Recupera l'email dell'utente per ogni recensione
            $query_utente = "SELECT * FROM utente WHERE IDUtente = '$IDUtente'";
            $result_utente = mysqli_query($connessione, $query_utente);
            
            if ($result_utente && mysqli_num_rows($result_utente) > 0) {
                $utente = mysqli_fetch_assoc($result_utente);
                $email = $utente["email"];
            } else {
                $email = "Email non disponibile";
            }

            if ($count < 2) {
                echo "
                    <div class=\"recensione_rifugio\">
                    <strong>Username:</strong> $email<br><br>
                    $recensione
                    <br><br>
                    </div>
                ";
            } else {
                echo "
                    <div class=\"recensione_rifugio nascosta\">
                    <strong>Username:</strong> $email<br><br>
                    $recensione
                    <br><br>
                    </div>
                ";
            }
            $count++;
        }
        
        if ($count > 2) {
            echo '<button class="carica-recensioni" data-rifugio-id="' . $IDrifugio . '">Carica altre recensioni</button>';
        }
        
        // Bottone per nascondere le recensioni visibili
        echo '<button class="nascondi-recensioni" data-rifugio-id="' . $IDrifugio . '" style="display: none;">Nascondi recensioni</button>';
    } else {
        echo "<div class=\"recensione_rifugio\">Nessuna recensione disponibile per questo rifugio.</div>";
    }
    echo "</div>";

    echo "</div>";
    echo "<br>";
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const caricaRecensioniButtons = document.querySelectorAll('.carica-recensioni');
        const nascondiRecensioniButtons = document.querySelectorAll('.nascondi-recensioni');

        caricaRecensioniButtons.forEach(button => {
            button.addEventListener('click', function() {
                const recensioniNascoste = this.parentElement.querySelectorAll('.recensione_rifugio.nascosta');

                recensioniNascoste.forEach(recensione => {
                    recensione.classList.remove('nascosta');
                    recensione.classList.add('visibile');
                });

                this.style.display = 'none';
                this.nextElementSibling.style.display = 'inline-block';
            });
        });

        nascondiRecensioniButtons.forEach(button => {
            button.addEventListener('click', function() {
                const recensioniVisibili = this.parentElement.querySelectorAll('.recensione_rifugio.visibile');

                recensioniVisibili.forEach(recensione => {
                    recensione.classList.remove('visibile');
                    recensione.classList.add('nascosta');
                });

                this.style.display = 'none';
                this.previousElementSibling.style.display = 'inline-block';
            });
        });
    });
</script>
