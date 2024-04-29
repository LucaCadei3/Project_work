<html>
    <head>
        <link rel="stylesheet" href="../css.css"/>
    </head>
    <body>
        <div class="rifugio">
            <p><h3>Percorsi trovati di difficolt&agrave; esperta: </h3></p>

            <h1>Bergamo</h1>

            <?php
                include('../../../config.php');
                include("../../../connessione_db.php");

                header('Content-type: text/html; charset=utf-8');

                $sql = "SELECT * FROM rifugi WHERE Provincia='Bergamo' AND Difficolta='difficile'";
                $result = mysqli_query($connessione,$sql);


                while($row = mysqli_fetch_assoc($result)){

                    $IDrifugio = $row ["IDRifugio"];
                    $Link_mappa = $row ["Mappa"];
                    $Nome_rifugio = $row ["NomeRifugio"];
                    $Descrizione_rifugio = $row ["Descrizione"];
                    $Immagine = $row ["Immagine"];

                    echo "<div class=\"sezione\"";
                    echo "<br>";
                    echo "<div class=\"rifugio\" id=$IDrifugio>";
                    echo "<h3><a href=\"$Link_mappa\" target=\"_blank\">$Nome_rifugio</a></h3></br>";
                    echo "<a href=\"$Link_mappa\" target=\"_blank\">";
                    echo "<img src=\"../../Bergamo/$Immagine\" alt=[\"NomeRifugio\"] width=300 height=250 align=\"right\" ></a>";
                    echo "$Descrizione_rifugio </div></div>";
                    echo "<br>";
                }
            ?>
        
            <h1>Brescia</h1>
            <?php

                $sql = "SELECT * FROM rifugi WHERE Provincia='Brescia' AND Difficolta='difficile'";
                $result = mysqli_query($connessione,$sql);


                while($row = mysqli_fetch_assoc($result)){

                    $IDrifugio = $row ["IDRifugio"];
                    $Link_mappa = $row ["Mappa"];
                    $Nome_rifugio = $row ["NomeRifugio"];
                    $Descrizione_rifugio = $row ["Descrizione"];
                    $Immagine = $row ["Immagine"];

                    echo "<div class=\"sezione\"";
                    echo "<br>";
                    echo "<div class=\"rifugio\" id=$IDrifugio>";
                    echo "<h3><a href=\"$Link_mappa\" target=\"_blank\">$Nome_rifugio</a></h3></br>";
                    echo "<a href=\"$Link_mappa\" target=\"_blank\">";
                    echo "<img src=\"../../Brescia/$Immagine\" alt=[\"NomeRifugio\"] width=300 height=250 align=\"right\" ></a>";
                    echo "$Descrizione_rifugio </div></div>";
                    echo "<br>";
                }
            ?>
            
            <h1>Lecco-Como</h1>
            <?php

                $sql = "SELECT * FROM rifugi WHERE Provincia='Lecco_Como' AND Difficolta='difficile'";
                $result = mysqli_query($connessione,$sql);


                while($row = mysqli_fetch_assoc($result)){

                    $IDrifugio = $row ["IDRifugio"];
                    $Link_mappa = $row ["Mappa"];
                    $Nome_rifugio = $row ["NomeRifugio"];
                    $Descrizione_rifugio = $row ["Descrizione"];
                    $Immagine = $row ["Immagine"];

                    echo "<div class=\"sezione\"";
                    echo "<br>";
                    echo "<div class=\"rifugio\" id=$IDrifugio>";
                    echo "<h3><a href=\"$Link_mappa\" target=\"_blank\">$Nome_rifugio</a></h3></br>";
                    echo "<a href=\"$Link_mappa\" target=\"_blank\">";
                    echo "<img src=\"../../Lecco_Como/$Immagine\" alt=[\"NomeRifugio\"] width=300 height=250 align=\"right\" ></a>";
                    echo "$Descrizione_rifugio </div></div>";
                    echo "<br>";
                }
            ?>

            
            <h1>Sondrio</h1>

            <?php

                $sql = "SELECT * FROM rifugi WHERE Provincia='Sondrio' AND Difficolta='difficile'";
                $result = mysqli_query($connessione,$sql);


                while($row = mysqli_fetch_assoc($result)){

                    $IDrifugio = $row ["IDRifugio"];
                    $Link_mappa = $row ["Mappa"];
                    $Nome_rifugio = $row ["NomeRifugio"];
                    $Descrizione_rifugio = $row ["Descrizione"];
                    $Immagine = $row ["Immagine"];

                    echo "<div class=\"sezione\"";
                    echo "<br>";
                    echo "<div class=\"rifugio\" id=$IDrifugio>";
                    echo "<h3><a href=\"$Link_mappa\" target=\"_blank\">$Nome_rifugio</a></h3></br>";
                    echo "<a href=\"$Link_mappa\" target=\"_blank\">";
                    echo "<img src=\"../../Sondrio/$Immagine\" alt=[\"NomeRifugio\"] width=300 height=250 align=\"right\" ></a>";
                    echo "$Descrizione_rifugio </div></div>";
                    echo "<br>";
                }
            ?>
        </div>
    </body>
</html>