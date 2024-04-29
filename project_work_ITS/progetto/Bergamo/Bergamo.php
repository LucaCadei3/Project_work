<html>
    <head>
        <meta charset ="UTF-8"/>
        <title>Bergamo</title><br>
        <h1>Bergamo</h1>
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
                        <a class="active" href="../Bergamo/Bergamo.php">Bergamo</a>
                        <a href="../Brescia/Brescia.php">Brescia</a>
                        <a href="../Lecco_Como/Lecco-Como.php">Lecco Como</a>
                        <a href="../Sondrio/Sondrio.php">Sondrio</a>
                    </div>
                </div>
                <a style = "float: right" href="../Home.php">Attrezzatura</a>
            </div>
            <?php
                include('../config.php');
                include("../connessione_db.php");
                

                $sql = "SELECT * FROM rifugi_tmp WHERE Provincia='Bergamo'";
                
                include('../richiamo_rifugi.php');
            ?>
            <a href="Bergamo.php"><img src="../immagini/freccia_alto.jpg" width=60 height=60 align="right"></a>
            <br><br><br><br>
        </div>
        <br><br>
    </body>
</html>