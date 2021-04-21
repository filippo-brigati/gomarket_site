<?php
    session_start();
    include('./funzioni.php');
    include('./send_mail.php');

    if (isset($_POST['mail'])) {
        $sql = "SELECT * FROM utente WHERE indirizzo_email = '{$_POST["mail"]}'";
        $res = connessione($sql, "gomarket");

        if(!isset($res[0])) {
            $_SESSION["feed_rec_pwd"] = "<div class='alert alert-danger' role='alert'>ERRORE! Abbiamo avuto un problema...Riprova!</div>";
            header("Location: ../page/login.php");
        }else {
            $_SESSION["feed_rec_pwd"] = "<div class='alert alert-success' role='alert'>Controlla la tua casella di posta, ti abbiamo inviato una mail con le indicazioni da seguire</div>";            

            $flag = generazioneCodice(8);
            $new_pwd = password_hash($flag, PASSWORD_DEFAULT);
            $body = "Salve <strong>".$res[0]["nome"]." ".$res[0]["cognome"]." </strong>abbiamo ricevuto la sua richiesta per l'aggiornamento della password, la volevamo informare 
            che le abbiamo assegnato una <strong>nuova password</strong>. D'ora in poi potrà eseguire il login utilizzando questa nuova password: <strong>".$flag."</strong>";
    
            inserisci("UPDATE `utente` SET `pwd` = '{$new_pwd}' WHERE `utente`.`ID` = {$res[0]["ID"]};", "gomarket");
            send_mail($_POST['mail'], "RECUPERO PASSWORD", $body);

            header("Location: ../page/login.php");
        }
    }
?>