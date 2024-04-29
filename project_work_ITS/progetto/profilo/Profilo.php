<html>
    <head>
        <title>Profilo</title><br>
        <h1>Il mio profilo</h1>
        <link rel="stylesheet" href="../css.css"/>
        
    </head>
    <body>
        
        <div class="divTesto">
            <div class="topnav">
                <a href="../index.php">Home</a>
                <a class = "active" style = "float: right" href="../profilo/Profilo.php">Accedi</a>
                <a style = "float: right" href="../Info.html">Info</a>
                <div class="dropdown">
                    <button class="dropbtn">Province</button>
                    <div class="dropdown-content">
                        <a href="../Bergamo/Bergamo.php">Bergamo</a>
                        <a href="../Brescia/Brescia.php">Brescia</a>
                        <a href="../Lecco_Como/Lecco-Como.php">Lecco Como</a>
                        <a href="../Sondrio/Sondrio.php">Sondrio</a>
                    </div>
                </div>
                <a style = "float: right" href="../Home.php">Attrezzatura</a>
            </div>
            <br>
            <div class="divProfilo" style="margin: auto;"><br><center>
                <div class="sezione_accesso">
                    <form id="login" action="VerificaLogin.php" method="post">
                        <div>
                            <br>
                            <label>Nome utente:<br></label><input class = "input_credenziali" type="text" name="email" placeholder = "Nome utente" required>                        
                        </div>
                        <br>
                        <div>
                            <div>
                                <label>Password:<br></label>
                                <input class="input_credenziali" type="password" name="password" placeholder="Password" required>
                                <?php 
                                    session_start();
                                    if(isset($_SESSION['password_error'])) { 
                                        echo "<br><br><span style='color: red;'>".$_SESSION['password_error']."</span>"; 
                                        unset($_SESSION['password_error']);
                                    } 
                                ?>
                            </div>
                        </div>
                        <br>
                        <br>
                        <input type="submit" id="submit" value="Accedi" class = "submit" style="text-align: center;">
                    </form>    
                    <p>
                        <form action = "Registrazione.html">
                            Se non sei ancora registrato clicca qui:<br><br>
                            <input type="submit" id="submit" value="REGISTRATI ORA" class = "submit_ritorno" style="text-align: center;">
                        </form>
                    </p>
                </div></center>
            </div>
        <a href="../index.php"><img src="../immagini/freccia.png" width=60 height=60></a></li>
        </div>
    </body>
</html>