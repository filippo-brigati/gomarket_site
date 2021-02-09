<?php
    session_start();
    include('funzioni.php');

    $e = $_POST["usr"];
    $u = $_POST["pwd"];

    $sql = "SELECT * FROM utente u WHERE u.indirizzo_email='$e' AND u.pwd='$u'";

    $risultato = connessione($sql, "gomarket");

    if(count($risultato) == 0 ) {
        $_SESSION["ERRORE_LOGIN"] = 1;
        
        header("Location: ../page/login.php");
    }else{
        $riga=$risultato[0];
        $_SESSION["ID_CLIENTE"] = $riga["ID"];
        $_SESSION["NOME"] = $riga["nome"];
        $_SESSION["COGNOME"] = $riga["cognome"];
        $_SESSION["COD_FISCALE"] = $riga["codice_fiscale"];
        $_SESSION["RUOLO"] = $riga["ruolo"];
        
        header("Location: ../index.php");
    }
?>