<?php
    /*print_r($_GET["id"]);*/
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
        $sql_ordine = "SELECT totale_ordine FROM ordine WHERE ID = {$_GET["id"]}";
        $ris_tot_ordine = connessione($sql_ordine, "gomarket");

        $sql = "SELECT * FROM prodotto_ordine po WHERE po.fk_id_ordine = {$_GET["id"]}";
        $risultato = connessione($sql, "gomarket");

        $flag = "
            <table class='table table-bordered'>
                <thead class='align-middle text-center'>
                    <tr>
                    <th scope='col'>NOME</th>
                    <th scope='col'>MARCA</th>
                    <th scope='col'>QUANTITA'</th>
                    <th scope='col'>COSTO UNITARIO</th>
                    <th scope='col'>SUPERMERCATO</th>
                    </tr>
                </thead>
                <tbody class='align-middle text-center'>
        ";

        $p_couter = 0;
        $q_couter = 0;

        foreach($risultato as $riga) { 
            $prod_sql = "SELECT * FROM prodotto WHERE ID = {$riga["fk_id_prodotto"]}";
            $ris = connessione($prod_sql, "gomarket");

            $sup_sql = "SELECT nome_super FROM supermercato WHERE ID = {$ris[0]["fk_id_supermercato"]}";
            $sup_ris = connessione($sup_sql, "gomarket");

            //print_r($sup_ris);
            $p_couter++;
            $q_couter = $q_couter + $riga["quantita_prodotto"];

            $flag .= "
                <tr>
                    <th>{$ris[0]["nome_prodotto"]}</th>
                    <td>{$ris[0]["marca_prodotto"]}</td>
                    <td>{$riga["quantita_prodotto"]}</td>
                    <td>{$ris[0]["costo_unitario_prodotto"]}</td>
                    <td>{$sup_ris[0]["nome_super"]}</td>
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
                <div class='row'>
                    <div class='col-md-7'>
                        {$flag}
                    </div>
                    <div class='col-md-5'>
                        <table class='table table-bordered'>
                            <thead class='align-middle text-center'>
                                <tr>
                                    <th>NUMERO PRODOTTI</th>
                                    <th>QUANTITA' PRODOTTI</th>
                                    <th>COSTO TOTALE</th>
                                </tr>
                            </thead>
                            <tbody class='align-middle text-center'>
                                <tr>
                                    <td>{$p_couter}</td>
                                    <td>{$q_couter}</td>
                                    <td>{$ris_tot_ordine[0]["totale_ordine"]} €</td>
                                </tr>
                            </tbody>
                        </table>
                        <img src='../../assets/09.svg' class='img-fluid mx-auto d-block'></img>
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