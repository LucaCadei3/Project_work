<?php
    session_start();

    if(!isset($_SESSION['key']) || $_SESSION['key'] != true){
        session_destroy();
        header("Location: ../../Profilo.php");
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
            <?php
                include("../../../config.php");
                include("../../../connessione_db.php");

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Controlla se è stato inviato un nome di rifugio
                    if(isset($_POST['rifugio'])) {
                        $rifugio = $_POST['rifugio'];
                    } else {
                        echo "Errore: Nome del rifugio non ricevuto.";
                        exit;
                    }
                }
            ?>
            <form method="POST" action="registra_commento.php"> <!-- Invia i dati al Codice 2 -->
				<div class = "sezione">
					<center>
						<label for="commento">Inserisci il tuo commento rispetto a <?php echo $rifugio ?>:</label><br><br>
						<textarea id="commento" name="commento" class = "recensione" rows="10" cols="50" maxlength="500"></textarea><br><br>
						<input type="hidden" name="rifugio" value="<?php echo $rifugio; ?>"><br> <!-- Includi il nome del rifugio come campo nascosto -->
						<input type="submit" value="Salva" class = "salva">
					</center>
				</div>
            </form>
        </div>
    </body>
</html>
