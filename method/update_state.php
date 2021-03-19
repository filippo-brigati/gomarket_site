<?php
    session_start();
    include('./funzioni.php');

    $id = $_GET['id'];
    $id_cliente = $_GET['idcliente'];
    $order_state = $_GET['so'];
    $totale_ordine = $_GET['tot'];

    if($order_state == 0) {
        $sql = "INSERT INTO ordine_fattorino (fk_id_ordine, fk_id_cliente, fk_id_fattorino)
        VALUES ($id, $id_cliente, {$_SESSION["ID_CLIENTE"]})";
        
        inserisci($sql, "gomarket");
    }else {
        //flag
    }

    $order_state += 1;
    $update_ordine = "UPDATE ordine
                        SET stato_ordine = {$order_state}
                        WHERE ID = {$id}";
    inserisci($update_ordine, "gomarket");

    if($order_state == 3) {
        $tot_ric = (($totale_ordine*20)/100);
        $oggi = date("Y-m-d");
        $aggiungi_ricompensa = "INSERT INTO ricompensa_fattorino (importo_ricompensa, data_ricompensa, fk_id_fattorino)
                                VALUES ($tot_ric, '$oggi', {$_SESSION["ID_CLIENTE"]})";
        inserisci($aggiungi_ricompensa, "gomarket");
    }

    header("Location: ../page/fattorino/registroconsegne.php");
?>