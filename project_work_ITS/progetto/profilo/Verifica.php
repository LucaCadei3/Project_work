<?php
  session_start(); //inizio la sessione
  //includo i file necessari a collegarmi al db con relativo script di accesso
  include("../config.php");
  include("../connessione_db.php");

  //variabili POST con anti sql Injection
  $username=mysqli_real_escape_string($connessione, $_POST['email']); //faccio l'escape dei caratteri dannosi
  $password=mysqli_real_escape_string($connessione, MD5($_POST['password'])); //MD5 cifra la password anche qui in questo modo corrisponde con quella del db

  $query = "SELECT * FROM utente WHERE email = '$username' AND password = '$password' ";
  $ris = mysqli_query($connessione, $query) or die (mysqli_error());
  $riga = mysqli_fetch_array($ris);  

  /*Prelevo l'identificativo dell'utente */
  $cod=$riga['email'];
  /* Effettuo il controllo */
  if ($cod == NULL) $trovato = 0 ;
  else $trovato = 1;  
  /* Username e password corrette */
  if($trovato == 1) {

    $_SESSION["autorizzato"] = 1;

    /*Registro il codice dell'utente*/
    $_SESSION['cod'] = $cod;

    /*Redirect alla pagina riservata*/
    header("location: Parte_privata.html");

  } else {

    /*Username e password errati, redirect alla pagina di login*/

    //echo '<script language=javascript>document.location.href="index.php"</script>';
    //creo una varibiale con un messaggio

    $msg = "Informazioni: email e password errati !!";

    //la codifico via urlencode informazioni-logout-effettuato-con-successo
    $msg = urlencode($msg); // invio il messaggio via get

    //ritorno a index.php usando GET posso recuperare e stampare a schermo il messaggio di avvenuto logout
    header("location: Profilo.php?msg=$msg");
  }
?>