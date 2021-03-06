<?php
    session_start();
    include('../../method/funzioni.php');

    if(!isset($_SESSION["NOME"])) {
        $nav = "
            <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                <div class='container'>
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
                <div class='container'>
                <a class='navbar-brand' href='../../index.php'>GOMARKET</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
                    <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a class='nav-link active' href='../portafoglio.php'>SALDO</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./nconsegna.php'>CONSEGNA</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./registroconsegne.php'>REGISTRO</a>
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

        $sql = "SELECT * FROM ricompensa_fattorino WHERE fk_id_fattorino = {$_SESSION["ID_CLIENTE"]}";
        $risultato = connessione($sql, "gomarket");
        $count = 0;
        $sum = 0;

        $flag = "
            <div class='table-responsive'>
            <table class='table table-bordered'>
                <thead class='align-middle text-center'>
                    <tr>
                        <th scope='col'>DATA ORDINE</th>
                        <th scope='col'>RICOMPENSA ORDINE</th>
                    </tr>
                </thead>
                <tbody class='align-middle text-center'>
        ";

        foreach($risultato as $riga) {
            $flag .= "
                <tr>
                    <td>{$riga["data_ricompensa"]}</td>
                    <td>{$riga["importo_ricompensa"]} €</td>
                </tr>
            ";
            $count++;
            $sum += $riga["importo_ricompensa"];
        }
        
        $flag .= "</tbody></table></div>";
        $med = $sum/$count;

        $body = "
            <div class='row first-item'>
                <div class='col-md-6'>
                    <div class='table-responsive'>
                        <table class='table table-bordered'>
                            <thead class='align-middle text-center'>
                                <tr>
                                    <th scope='col'>CONSEGNE TOTALI</th>
                                    <th scope='col'>RICOMPENSA TOTALE</th>
                                    <th scope='col'>GUADAGNO MEDIO</th>
                                </tr>
                            </thead>
                            <tbody class='align-middle text-center'>
                                <tr>
                                    <td>{$count}</td>
                                    <td>{$sum} €</td>
                                    <td>{$med} €</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {$flag}
                </div>
                <div class='col-md-6'>
                    <img src='../../assets/23.svg' class='img-fluid mx-auto d-block'>
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
            <link rel='stylesheet' href='../../style/style.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
            <script src='../../js/main.js'></script>
            <title>GoMarket</title>
            </head>
            <body>
                {$nav}
                <div class='container-lg'>
                    {$body}
                </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>
            </body>
        </html>    
    ";

    print_r($html);
?>