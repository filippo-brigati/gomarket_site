<?php
    session_start();
    include("./funzioni.php");

    $id = $_GET["id"];

    if(!isset($_SESSION["ID_CLIENTE"]) or !isset($id)) {
        $nav = "
            <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                <div class='container-fluid'>
                <a class='navbar-brand' href='../index.php'>GOMARKET</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
                    <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a class='nav-link' href='../page/registrazione.php'>REGISTRATI</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../page/login.php'>ACCEDI</a>
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
                    <img src='../assets/04.svg' class='img-fluid mx-auto d-block'>
                    </div>
                </div>
            </div>
        ";

        $html = "
            <html>
                <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
                <link rel='preconnect' href='https://fonts.gstatic.com'>
                <link href='https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap' rel='stylesheet'>
                <link rel='stylesheet' href='../style/style.css'>
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
    }else {
        $sql = "DELETE FROM ordine WHERE ID = $id";
        inserisci($sql, "gomarket");

        $second_sql = "DELETE FROM prodotto_ordine WHERE fk_id_ordine = $id";
        inserisci($second_sql, "gomarket");

        header("Location: ../page/cliente/registro.php");
    }
?>