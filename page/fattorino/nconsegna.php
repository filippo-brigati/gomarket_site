<?php
    session_start();
    include('../../method/funzioni.php');

    if(!isset($_SESSION["NOME"]) or $_SESSION["RUOLO"] != 1) {
        $nav = "
            <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                <div class='container-fluid'>
                <a class='navbar-brand' href='../../index.php'>GOMARKET</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
                    <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a class='nav-link' href='../registrazione.php'>REGISTRATI</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../login.php'>ACCEDI</a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        ";

        $body = "
            <div class='container'>
                <div class='container row'>
                <div class='col-2'></div>
                <div class='col-8 first-item'>
                    <img src='../../assets/04.svg' class='img-fluid mx-auto d-block'>
                    </div>
                </div>
            </div>
        ";
    }else {
        $nav = "
            <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                <div class='container-fluid'>
                <a class='navbar-brand' href='../../index.php'>GOMARKET</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
                    <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a class='nav-link' href='./portafoglio.php'>SALDO</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='./nconsegna.php'>CONSEGNA</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./registroconsegne.php'>REGISTRO</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./profilo.php'>PROFILO</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../../method/logout.php'>LOGOUT</a>
                    </li>                 
                    </ul>
                </div>
                </div>
            </nav>
        ";
        $primosql = "SELECT i.citta FROM indirizzo i WHERE i.fk_id_utente = {$_SESSION["ID_CLIENTE"]}";
        $r = connessione($primosql, "gomarket");

        $sql = "SELECT o.ID, o.stato_ordine, o.totale_ordine, o.data_ordine, o.fk_id_utente, o.codice_ordine, i.citta, i.CAP, i.via, i.num_civico 
                FROM ordine o, indirizzo i 
                WHERE o.stato_ordine = 0 
                AND i.fk_id_utente = o.fk_id_utente
                AND i.citta LIKE '{$r[0]['citta']}'";
        $risultato = connessione($sql, "gomarket");

        $flag = "<div class='accordion' id='accordionExample'>";

        foreach($risultato as $riga) {
            $flag .= "
            <div class='modal fade' id='pickmodal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>ATTENZIONE!</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <div class='alert alert-warning' role='alert'>
                            Stai per prendere in consegna l'ordine {$riga["ID"]}, devi essere certo di poterlo consegnare
                            entro 4/5 giorni lavorativi!
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-danger' data-bs-dismiss='modal'>ANNULLA</button>
                        <a type='button' class='btn btn-outline-success' href='../../method/update_state.php?id={$riga["ID"]}&idcliente={$riga["fk_id_utente"]}&so={$riga["stato_ordine"]}'>CONFERMA CONSEGNA</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='heading{$riga["ID"]}'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse{$riga["ID"]}' aria-expanded='false' aria-controls='collapse{$riga["ID"]}'>
                    <strong>CODICE ORDINE: {$riga["codice_ordine"]}</strong>
                </button>
                </h2>
                <div id='collapse{$riga["ID"]}' class='accordion-collapse collapse' aria-labelledby='heading{$riga["ID"]}' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <p><strong>ID ORDINE: </strong>{$riga["ID"]}</p>
                            <p><strong>CODICE ORDINE: </strong>{$riga["codice_ordine"]}</p>
                            <p><strong>DATA ORDINE: </strong>{$riga["data_ordine"]}</p>
                        </div>
                        <div class='col-md-6'>
                            <p><strong>TOTALE ORDINE: {$riga["totale_ordine"]} €</strong></p>
                            <p><strong>CITTÁ: </strong>{$riga["citta"]}</p>
                            <p><strong>INDIRIZZO: </strong>{$riga["via"]} {$riga["num_civico"]}</p>
                            <div class='d-grid gap-2 d-md-flex justify-content-md-start'>
                                <a class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#pickmodal' type='button'>CONSEGNA ORDINE</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            ";
        }

        $flag .= "</div>";

        $body = "
            <div class='row first-item'>
                <div class='col-md-6'>
                    {$flag}
                </div>
                <div class='col-md-6'>
                    <img src='../../assets/24.svg' class='img-fluid mx-auto d-block'>
                </div>
            </div>
        ";
    }

    $html = "
        <html>
            <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
            <link rel='preconnect' href='https://fonts.gstatic.com'>
            <link href='https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../../style/style.css'>
            <title>GoMarket</title>
            </head>
            <body>
                <div class='container-lg'>
                    {$nav}
                    {$body}
                </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>
            </body>
        </html>    
    ";

    print_r($html);
?>