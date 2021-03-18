<?php
    session_start();
    include('./funzioni.php');

    $id = $_GET['id'];
    $id_cliente = $_GET['idcliente'];
    $order_state = $_GET['so'];

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

    header("Location: ../page/fattorino/registroconsegne.php");
?>