<?php
    session_start();
    include('../../method/funzioni.php');

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
        $num_prodotti = $_GET['np'];
        $num_tot_item = $_GET['nti'];
        $costo_tot = $_GET['ct'];
    
        $cod = generazioneCodice(6);
        $today = date("Y-m-d");
    
        $sql = "INSERT INTO ordine (codice_ordine, stato_ordine, totale_ordine, data_ordine, fk_id_utente) 
                VALUES ('$cod', 0, $costo_tot, '$today', {$_SESSION['ID_CLIENTE']})";
    
        inserisci($sql, "gomarket");

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
                        <a class='nav-link active' href='./nordine.php'>ORDINE</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./registro.php'>REGISTRO</a>
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
                <div class='container row'>
                    <div class='col-6'>
                        <img src='../../assets/08.svg' class='img-fluid mx-auto d-block'>
                    </div>
                    <div class='col-6 first-item'>
                        <div class='alert alert-success' role='alert'>
                            OTTIMO!! Il tuo ordine è stato resistrato con successo! Puoi controllarne il suo stato grazie
                            alla apposita <a href='./registro.php'>pagina.</a>
                        </div>
                    </div>
                </div>
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