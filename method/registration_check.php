<?php
    session_start();
    include("../method/funzioni.php");

    $arr[0] = $_POST["nome_utente"];
    $arr[1] = $_POST["cognome_utente"];
    $arr[2] = $_POST["email_utente"];
    $arr[3] = $_POST["password_utente"];
    $arr[4] = $_POST["username"];
    $arr[5] = $_POST["cod_fiscale"];
    $arr[6] = $_POST["regione_utente"];
    $arr[7] = $_POST["via_utente"];
    $arr[8] = $_POST["cap_utente"];
    $arr[9] = $_POST["numero_civico_utente"];

    $arr[10] = $_POST["data_di_nascita"];
    $arr[11] = $_POST["ruolo"];

    $first_sql = "SELECT * FROM utente u";
    $risultato = connessione($first_sql, "gomarket");

    if(controllo($risultato, $arr) == 0) {
        $id = connessione("SELECT MAX(ID) AS Max_Id from utente", "gomarket");
        $next_id = $id[0];
        $next_id = $next_id["Max_Id"]+1;

        $second_sql = "INSERT INTO utente (ID, nome, cognome, indirizzo_email, pwd, nome_utente, codice_fiscale, data_di_nascita, ruolo) 
                       VALUES ($next_id, '$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]', '$arr[10]', $arr[11])";
        $third_sql = "INSERT INTO indirizzo (citta, CAP, via, num_civico, fk_id_utente) 
                      VALUES ('$arr[6]', '$arr[8]', '$arr[7]', '$arr[9]', $next_id)";
        inserisci($second_sql, "gomarket");
        inserisci($third_sql, "gomarket");

        header("Location: ../index.php");
    }else {
        header("Location: ../page/registrazione.php");
    }
?>