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

        $rows = $_SESSION["nordine"];

        $flag = array();
        $prezzo = array();

        $sql = "SELECT * FROM prodotto";
        $risultato = connessione($sql, "gomarket");

        //print_r($risultato);
        //print_r($rows);

        for($i=0;$i<count($rows);$i++) {
            for($j=0;$j<count($risultato);$j++) {
                if($rows[$i]["NOME PRODOTTO"] == $risultato[$j]["nome_prodotto"] and $rows[$i]["MARCA PRODOTTO"] == $risultato[$j]["marca_prodotto"]) {
                    $flag[$i] = 2;
                    $prezzo[$i] = ($rows[$i]["QUANTITA PRODOTTO"]*$risultato[$j]["costo_unitario_prodotto"]);
                    break;
                }else if($rows[$i]["NOME PRODOTTO"] == $risultato[$j]["nome_prodotto"] and $rows[$i]["MARCA PRODOTTO"] != $risultato[$j]["marca_prodotto"]) {
                    $flag[$i] = 1;
                    $prezzo[$i] = ($rows[$i]["QUANTITA PRODOTTO"]*$risultato[$j]["costo_unitario_prodotto"]);
                    break;
                }else if($rows[$i]["NOME PRODOTTO"] != $risultato[$j]["nome_prodotto"] and $rows[$i]["MARCA PRODOTTO"] != $risultato[$j]["marca_prodotto"]) {
                    $flag[$i] = 0;
                    $prezzo[$i] = 0;
                    break;
                }
            }
        }
        //print_r($prezzo);
        //print_r($flag);

        $k = 0;
        $num_tot_item = 0;
        $table = "<table class='table table-striped text-center'>
                    <thead>
                    <tr>
                        <th scope='col'>NOME</th>
                        <th scope='col'>MARCA</th>
                        <th scope='col'>QUANTITA'</th>
                        <th scope='col'>COSTO TOT</th>
                    </tr>
                    </thead>
                    <tbody>";

        foreach($rows as $r) {
            if($flag[$k] == 2) {
                $table .= "<tr>
                    <th>{$r['NOME PRODOTTO']}</th>
                    <td>{$r['MARCA PRODOTTO']}</td>
                    <td>{$r['QUANTITA PRODOTTO']}</td>
                    <td>{$prezzo[$k]}</td>
                </tr>";
                $num_tot_item += $r['QUANTITA PRODOTTO'];
            }else if($flag[$k] == 1) {
                $table .= "<tr>
                    <th>{$r['NOME PRODOTTO']}</th>
                    <td>{$r['MARCA PRODOTTO']}</td>
                    <td>{$r['QUANTITA PRODOTTO']}</td>
                    <td>{$prezzo[$k]}</td>
                </tr>";
                $num_tot_item += $r['QUANTITA PRODOTTO'];
            }else if($flag[$k] == 0) {
                $table .= "<tr>
                    <th>{$r['NOME PRODOTTO']}</th>
                    <td>{$r['MARCA PRODOTTO']}</td>
                    <td>{$r['QUANTITA PRODOTTO']}</td>
                    <td><img src='../../assets/danger_icon.svg' style='max-width: 22px'></img></td>
                </tr>";
            }
            $k++;
        }

        $num_prodotti = count($flag);
        $costo_tot = 0;
        for($s=0;$s<count($prezzo);$s++) { $costo_tot += $prezzo[$s]; }

        $riep_table = "
            <table class='table table-striped text-center'>
                <thead>
                    <tr>
                        <th>NUMERO PRODOTTI</th>
                        <th>QUANTITA' PRODOTTO</th>
                        <th>COSTO TOTALE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$num_prodotti}</td>
                        <td>{$num_tot_item}</td>
                        <td>{$costo_tot}</td>
                    </tr>
                </tbody>
            </table>
        ";

        $table .= "</tbody></table>";
        $body = "
            <div class='container first-item'>
                <div class='row'>
                    <div class='col-6'>{$table}</div>
                    <div class='col-1'></div>
                    <div class='col-5'>
                        <p class='h3'>Riepilogo Ordine</p>
                        {$riep_table}
                    </div>
                </div>
            </div>";
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