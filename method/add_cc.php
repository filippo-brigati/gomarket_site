<?php
    session_start();
    include('./funzioni.php');

    $numero_carta = $_POST['n_card'];
    $data_scadenza = $_POST['d_scad'];
    $cv = $_POST['cv'];
    
    if(isset($_POST['remember'])) {
        $sql = "INSERT INTO carta_credito (numero_carta, data_scadenza, cv, fk_id_utente) 
        VALUES ('$numero_carta', '$data_scadenza', $cv, {$_SESSION["ID_CLIENTE"]})";
        
        inserisci($sql, "gomarket");
    }
    
    header("Location: ../page/cliente/nordine-1.php");
?>