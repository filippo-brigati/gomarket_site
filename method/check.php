<?php
    session_start();
    include('./funzioni.php');

    $flag = 0;
    $sql = "SELECT * FROM utente u";
    $risultato = connessione($sql, "gomarket");

    foreach($risultato as $r) {
        if(password_verify($_POST["pwd"], $r["pwd"])) {  
            $_SESSION["ID_CLIENTE"] = $r["ID"];
            $_SESSION["NOME"] = $r["nome"];
            $_SESSION["COGNOME"] = $r["cognome"];
            $_SESSION["COD_FISCALE"] = $r["codice_fiscale"];
            $_SESSION["RUOLO"] = $r["ruolo"]; 
            $flag = 1;            
        }
    }
    if($flag == 1) { header("Location: ../index.php"); }
    else { $_SESSION["ERRORE_LOGIN"] = 1; header("Location: ../page/login.php"); }
?>