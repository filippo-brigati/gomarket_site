<?php
    session_start();
    include("../method/funzioni.php");

    $arr[0] = $_POST["nome_utente"];
    $arr[1] = $_POST["cognome_utente"];
    $arr[2] = $_POST["email_utente"];
    $arr[4] = $_POST["username"];
    $arr[5] = $_POST["cod_fiscale"];
    $arr[6] = $_POST["regione_utente"];
    $arr[7] = $_POST["via_utente"];
    $arr[8] = $_POST["cap_utente"];
    $arr[9] = $_POST["numero_civico_utente"];

    $arr[10] = $_POST["data_di_nascita"];
    $arr[11] = $_POST["ruolo"];

    $first_sql = "UPDATE utente u 
            SET u.nome = '$arr[0]', 
                u.cognome = '$arr[1]',
                u.indirizzo_email = '$arr[2]', 
                u.nome_utente = '$arr[4]', 
                u.codice_fiscale = '$arr[5]', 
                u.data_di_nascita = '$arr[10]', 
                u.ruolo = $arr[11]
            WHERE u.ID = {$_SESSION["ID_CLIENTE"]}";
    $second_sql = "UPDATE indirizzo i
                   SET i.citta = '$arr[6]',
                       i.CAP = $arr[8],
                       i.via = '$arr[7]',
                       i.num_civico = '$arr[9]'
                   WHERE i.fk_id_utente = {$_SESSION["ID_CLIENTE"]}";
    
    inserisci($first_sql, "gomarket");
    inserisci($second_sql, "gomarket");

    $_SESSION["NOME"] = $arr[0];

    header("Location: ../page/profilo.php");
?>