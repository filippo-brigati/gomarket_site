<?php
    session_start();
    include('./funzioni.php');

    $data_scadenza = $_POST['d_scad'];
    $last_nb = substr($_POST['n_card'], 12);
    
    if(isset($_POST['remember'])) {
        $numero_carta = password_hash($_POST['n_card'], PASSWORD_DEFAULT);
        $cv = password_hash($_POST['cv'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO carta_credito (numero_carta, data_scadenza, cv, last_nb, fk_id_utente) 
        VALUES ('$numero_carta', '$data_scadenza', '$cv', '$last_nb', {$_SESSION["ID_CLIENTE"]})";
        
        inserisci($sql, "gomarket");
    }
    
    header("Location: ../page/cliente/nordine-1.php");
?>