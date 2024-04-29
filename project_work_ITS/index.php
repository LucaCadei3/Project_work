<!DOCTYPE html>
<html>
<head>
    <title>Project work ITS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="progetto/css.css" />
</head>
<body>
    <br><br><br>
    <div class="divTesto">
        <div class="sezione">
            <!--
            <?php
            // Parte di PHP commentata
            /*
            if ($metodo == "GET" || $metodo == "POST-KO") {
                echo "<p>" . $errore . "</p>";
                echo "<p>Compila i campi per installare il database</p>";
            } else {
                echo "<p>Installazione avvenuta con successo!</p>";
            }
            */
            ?>
            -->
            <center>
                <p>Compila i campi per installare il database</p>
                <form method="post">
                    <label for="nomeDB">Nome del database:</label><br>
                    <input type="text" name="nomeDB"><br>
                    <label for="hostDB">Host:</label><br>
                    <input type="text" name="hostDB"><br>
                    <label for="usernameDB">Username:</label><br>
                    <input type="text" name="usernameDB"><br>
                    <label for="passwordDB">Password:</label><br>
                    <input type="password" name="passwordDB"><br>
                    <input type="submit" name="invio" value="INSTALLA">
                </form>
            </center>
        </div>
    </div>
</body>
</html>
