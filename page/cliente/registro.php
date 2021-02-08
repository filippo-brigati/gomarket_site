<?php
    session_start();
    include("../../method/funzioni.php");

    if(!isset($_SESSION["NOME"])) {
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
        $sql = "SELECT * FROM ordine o WHERE o.fk_id_utente = {$_SESSION["ID_CLIENTE"]}";
        $risultato = connessione($sql, "gomarket");

        $flag = "
            <table class='table table-bordered'>
                <thead class='align-middle text-center'>
                    <tr>
                    <th scope='col'>ID ORDINE</th>
                    <th scope='col'>CODICE ORDINE</th>
                    <th scope='col'>DATA ORDINE</th>
                    <th scope='col'>STATO ORDINE</th>
                    <th scope='col'>TOTALE ORDINE</th>
                    <th scoper='col'>OPZIONI</th>
                    </tr>
                </thead>
                <tbody class='align-middle text-center'>
        ";

        foreach($risultato as $riga) {
            if($riga["stato_ordine"] == 0) { $stato_ordine = "<span class='text-warning align-middle'>in attesa</span>"; }
            else if($riga["stato_ordine"] == 1) { $stato_ordine = "<span class='text-secondary'>in preparazione</span>"; }
            else if($riga["stato_ordine"] == 2) { $stato_ordine = "<span class='text-primary'>in consegna</span>"; }
            else { $stato_ordine = "<span class='text-success'>consegnato</span>"; }
            
            $flag .= "
                <tr>
                    <th>{$riga["ID"]}</th>
                    <td>{$riga["codice_ordine"]}</td>
                    <td>{$riga["data_ordine"]}</td>
                    <td>{$stato_ordine}</td>
                    <td>{$riga["totale_ordine"]}</td>
                    <td><a href='./detordine.php?id={$riga["ID"]}'>informazioni</a></td>
                </tr>
            ";
        }

        $flag .= "</tbody></table>";

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
                        <a class='nav-link' href='./nordine.php'>ORDINE</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='./registro.php'>REGISTRO</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../profilo.php'>PROFILO</a>
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
            <div class='container first-item'>
                {$flag}
            </div>
        ";
    }

    $html = "
        <html>
            <head>
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
            </body>
        </html>    
    ";

    print_r($html);
?>