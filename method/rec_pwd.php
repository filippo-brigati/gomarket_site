<?php
    session_start();
    include('./funzioni.php');

    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['mail'])) {
        $sql = "SELECT * FROM utente WHERE indirizzo_email = '{$_POST["mail"]}'";
        $res = connessione($sql, "gomarket");

        if(!isset($res[0])) {
            $_SESSION["feed_rec_pwd"] = "<div class='alert alert-danger' role='alert'>ERRORE! Abbiamo avuto un problema...Riprova!</div>";
            header("Location: ../page/login.php");
        }else {
            $_SESSION["feed_rec_pwd"] = "<div class='alert alert-success' role='alert'>Controlla la tua casella di posta, ti abbiamo inviato una mail con le indicazioni da seguire</div>";            

            $email = $_POST['mail'];
            $subject = "RECUPERO PASSWORD";
            $new_pwd = generazioneCodice(8);
            $body = "Salve <strong>".$res[0]["nome"]." ".$res[0]["cognome"]." </strong>abbiamo ricevuto la sua richiesta per l'aggiornamento della password, la volevamo informare 
            che le abbiamo assegnato una <strong>nuova password</strong>. D'ora in poi potrà eseguire il login utilizzando questa nuova password: <strong>".$new_pwd."</strong>";
    
            inserisci("UPDATE `utente` SET `pwd` = '{$new_pwd}' WHERE `utente`.`ID` = {$res[0]["ID"]};", "gomarket");
    
            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
    
            $mail = new PHPMailer();
    
            //SMTP Settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "COMPANY_EMAIL";
            $mail->Password = 'COMPANY_PWD';
            $mail->Port = 465; //587
            $mail->SMTPSecure = "ssl"; //tls
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom("COMPANY_EMAIL");
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = $body;
    
            if ($mail->send()) {
                $status = "success";
                $response = "Email is sent!";
            } else {
                $status = "failed";
                $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
            }
    
            //exit(json_encode(array("status" => $status, "response" => $response)));

            header("Location: ../page/login.php");
        }
    }
?>
