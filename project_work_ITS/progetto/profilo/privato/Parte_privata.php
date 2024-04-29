<?php
    session_start();

    if(!isset($_SESSION['key']) || $_SESSION['key'] != true){ 
        session_destroy();
        header("Location: ../Profilo.php");
    } 

    $benvenuto = "<h3>Benvenuto: <strong>" . $_SESSION['nome'] ."</strong></h3>";
?>

<html>
    <head>
        <title>Privato</title><br>
        <h1>Il mio profilo</h1>
        <link rel="stylesheet" href="../../css.css"/>
    </head>
    <body>
        <div class="divTesto">
          <div class="topnav">
            <a href="../../Home.php">Home</a>
            <a style = "float: right" href="../Profilo.php">Log-out</a>
            <a style = "float: right" href="recensione/Diario.php">Diario</a>
            <a style = "float: right" href="../../Info.html">Info</a>
            <div class="dropdown">
              <button class="dropbtn">Province</button>
              <div class="dropdown-content">
                <a href="../../Bergamo/Bergamo.php">Bergamo</a>
                <a href="../../Brescia/Brescia.php">Brescia</a>
                <a href="../../Lecco_Como/Lecco-Como.php">Lecco Como</a>
                <a href="../../Sondrio/Sondrio.php">Sondrio</a>
              </div>
            </div>
            <a style = "float: right" href="../../Home.php">Attrezzatura</a>
          </div>
          <br>
          <SCRIPT>
            function mostra(str){
              if (str.length == 0){ 
                  document.getElementById("risposta").innerHTML = "";
                  return;
              }
              if (window.XMLHttpRequest){ 
                xmlhttp = new XMLHttpRequest();
              }
              else{                        // browser IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  document.getElementById("risposta").innerHTML = xmlhttp.responseText;
                }
              }
              xmlhttp.open("GET", "Percorsi_divisi/Percorsi_"+str+".php", true);
              xmlhttp.send();
            }
          </SCRIPT>
          
          <div class = "sezione_privata">

            <?php echo $benvenuto; ?>
            <br>
            <button value="Semplici" onclick="mostra(this.value)" class="percorsi_divisi">Percorsi Semplici</button>
            <button value="Intermedi" onclick="mostra(this.value)" class="percorsi_divisi">Percorsi Intermedi</button>
            <button value="Esperti" onclick="mostra(this.value)" class="percorsi_divisi">Percorsi Esperti</button>
          </div>
          <DIV ID="risposta"></DIV>
        </div>
    </body>
</html>