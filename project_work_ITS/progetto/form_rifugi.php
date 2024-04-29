<html>
<link rel="stylesheet" href="css.css"/>
    <body>
        <div class="divTesto">
                <div class="topnav">
                    <a href="Home.php">Home</a>
                    <a class="active" href="Bergamo.php">Bergamo</a>
                    <a href="Brescia.php">Brescia</a>
                    <a href="Lecco-Como.php">Lecco Como</a>
                    <a href="Sondrio.php">Sondrio</a>
                    <a href="Info.html">Info</a>
                    <a href="profilo/Profilo.php">Profilo</a>
                </div>
                <br>
                <?php

                include("config.php");
                include("connessione_db.php");

                ?>

                <form method="post" action="Elenco_rifugi.php">

                <label for="rifugi">Inserisci rifugio:</label>
                <select id="rifugio" name="rifugio">

                <?php

                $sql = "SELECT NomeRifugio FROM rifugi";
                $result = mysqli_query($connessione, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                
                    echo "<option value=\"".$row["NomeRifugio"]."\">".$row["NomeRifugio"]."</option>";
                }
                } else {
                echo "0 results";
                }

                ?>
                </select>

                <input type="submit">
                </form>
            </div>
    </body>
</html>