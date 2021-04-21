<?php
    session_start();
    include('funzioni.php');

    $hashed_password = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

    if(password_verify($_POST["pwd"], $hashed_password)) {
        $sql = "SELECT * FROM utente u WHERE u.indirizzo_email='{$_POST["usr"]}' AND u.pwd='$hashed_password'";
        $risultato = connessione($sql, "gomarket");

        if(!isset($risultato)) {
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
    }else {
        $_SESSION["ERRORE_LOGIN"] = 1;
    
        header("Location: ../page/login.php"); 
    }
?>