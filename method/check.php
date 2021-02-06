<?php
    session_start();
    include('funzioni.php');

    $e = $_POST["usr"];
    $u = $_POST["pwd"];

    $sql = "SELECT * FROM utente u WHERE u.indirizzo_email='$e' AND u.pwd='$u'";

    $risultato = connessione($sql, "gomarket");

    if(count($risultato) == 0 ) {
        $html = "<p class='h4'>Utente non riconosciuto</p>";
        print_r($html);
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