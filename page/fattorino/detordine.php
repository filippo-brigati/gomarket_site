<?php
    session_start();
    include('../../method/funzioni.php');

    if(!isset($_SESSION["ID_CLIENTE"]) or !isset($_GET["id"])) {
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
        $sql = "SELECT * FROM ordine INNER JOIN utente ON ordine.fk_id_utente = utente.ID WHERE ordine.ID = {$_GET["id"]}";
        $risultato = connessione($sql, "gomarket");

        $ind_sql = "SELECT * FROM indirizzo WHERE fk_id_utente = {$risultato[0]["ID"]}";
        $ind_result = connessione($ind_sql, "gomarket");

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
                        <a class='nav-link' href='../portafoglio.php'>SALDO</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./nconsegna.php'>CONSEGNA</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='./registroconsegne.php'>REGISTRO</a>
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

        $body = "
            <div class='row first-item'>
                <div class='col-md-6'>
                    
                </div>
                <div class='col-md-6'>
                    <table class='table table-bordered'>
                        <thead class='align-middle text-center'>
                            <tr>
                                <th>DESTINATARIO ORDINE</th>
                                <th>CODICE ORDINE</th>
                                <th>COSTO TOTALE</th>
                            </tr>
                        </thead>
                        <tbody class='align-middle text-center'>
                            <tr>
                                <td>{$risultato[0]["nome"]} {$risultato[0]["cognome"]}</td>
                                <td>{$risultato[0]["codice_ordine"]}</td>
                                <td>{$risultato[0]["totale_ordine"]} €</td>
                            </tr>
                        </tbody>
                    </table>
                    <img src='../../assets/09.svg' class='img-fluid mx-auto d-block'>
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