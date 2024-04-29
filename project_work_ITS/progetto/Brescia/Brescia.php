<html>
    <head>
        <title>Brescia</title><br>
        <h1>Brescia</h1>
        <link rel="stylesheet" href="../css.css"/>
    </head>
    <body>
        <div class="divTesto">
            <div class="topnav">
            <a href="../index.php">Home</a>
                <a style = "float: right" href="../profilo/Profilo.php">Accedi</a>
                <a style = "float: right" href="../Info.html">Info</a>
                <div class="dropdown">
                    <button class="dropbtn">Province</button>
                    <div class="dropdown-content">
                        <a href="../Bergamo/Bergamo.php">Bergamo</a>
                        <a class="active" href="../Brescia/Brescia.php">Brescia</a>
                        <a href="../Lecco_Como/Lecco-Como.php">Lecco Como</a>
                        <a href="../Sondrio/Sondrio.php">Sondrio</a>
                    </div>
                </div>
                <a style = "float: right" href="../Home.php">Attrezzatura</a>
            </div>
            
            
            <?php
                include('../config.php');
                include("../connessione_db.php");

                $sql = "SELECT * FROM rifugi WHERE Provincia='Brescia'";
                
                include('../richiamo_rifugi.php');
            ?>
            
            <a href="Brescia.php"><img src="../immagini/freccia_alto.jpg" width=60 height=60 align="right"></a></li>
            <br><br><br><br>
        </div>
        <br><br>
    </body>
</html>