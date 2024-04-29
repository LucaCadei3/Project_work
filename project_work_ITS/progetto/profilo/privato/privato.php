<?php
  session_start();
  //se non c'è la sessione registrata
  if (!isset($_SESSION["autorizzato"])) {
    echo "<h1>Area riservata, accesso negato.</h1>";
    echo "Per effettuare il login clicca <a href='index.php'><font color='blue'>qui</font></a>";
    die;
  }

  //Altrimenti Prelevo il codice identificatico dell'utente loggato
  $cod = $_SESSION['cod']; //id cod recuperato nel file di verifica
  echo "<h1>SEI NELLA SESSIONE PRIVATA !!!</h1>";
  echo "<br />";
  echo "<b>Il nome utente e' : ".$cod."<\b>";
  echo "<br \><br \>";
  echo "<a href=\"logout.php\">Logout<a>";
?>
