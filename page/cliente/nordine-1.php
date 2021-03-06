<?php
    session_start();
    include("../../method/funzioni.php");

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
        $final_prod_array = array();
        $i = 0;
        $s = 0;
        
        foreach($rows as $r) {
            $sql = "SELECT * FROM prodotto WHERE nome_prodotto = '{$r["NOME PRODOTTO"]}' AND marca_prodotto = '{$r["MARCA PRODOTTO"]}'";
            $risultato = connessione($sql, "gomarket");

            if(empty($risultato)) {
                $flag[$i] = 0;
                $prezzo[$i] = 0;
            }else {
                $flag[$i] = 2;
                $prezzo[$i] = ($r["QUANTITA PRODOTTO"]*$risultato[0]["costo_unitario_prodotto"]);
                $final_prod_array[$s] = array($risultato[0]["ID"], $r["QUANTITA PRODOTTO"]);  
                $s++;           
            }
            $i++;
        }

        $_SESSION["FINAL_PROD_ARRAY"] = $final_prod_array;
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
                    <td>{$prezzo[$k]} €</td>
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

        $sql_indirizzo = "SELECT * FROM indirizzo WHERE fk_id_utente = {$_SESSION['ID_CLIENTE']}";
        $risultato_indirizzo = connessione($sql_indirizzo, "gomarket");
        $ris_ind_finale = $risultato_indirizzo[0];

        $modal_content = "";
        $is_checked = "";

        $check_card = "SELECT * FROM carta_credito WHERE fk_id_utente = {$_SESSION['ID_CLIENTE']}";
        $result_card = connessione($check_card, "gomarket");
        if(!isset($result_card[0])) {
            $modal_content .= "
                <form name='credit_card_form' action='../../method/add_cc.php' method='post'>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Numero Carta:</span>
                        <input type='text' class='form-control' name='n_card' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Data Scadenza Carta:</span>
                        <input class='form-control' type='date' value='2011-08' name='d_scad' required> 
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text' required>CV:</span>
                        <input type='text' class='form-control' name='cv'>
                    </div>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' value='' name='remember' id='flexCheckChecked'>
                        <label class='form-check-label' for='flexCheckChecked'>
                            Ricorda Carta
                        </label>
                    </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-danger' data-bs-dismiss='modal'>ANNULLA</button>
                        <button type='submit' class='btn btn-outline-success'>CONFERMA</button>
                    </div>
                </form>
            ";
        }else {
            foreach($result_card as $rc) {
                $str_card = "**** **** **** ".$rc["last_nb"];

                $modal_content .= "
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' value='' name='card' id='flexCheckChecked'>
                        <label class='form-check-label' for='flexCheckChecked'>
                            {$str_card}
                        </label>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-success' data-bs-dismiss='modal'>CONFERVA</button>
                    </div>
                ";

                $is_checked = "checked";
            }
        }

        $riep_table = "
            <div class='accordion accordion-flush' id='accordionFlushExample'>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='flush-headingOne'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapseOne' aria-expanded='false' aria-controls='flush-collapseOne'>
                    RIEPILOGO ORDINE
                </button>
                </h2>
                <div id='flush-collapseOne' class='accordion-collapse collapse' aria-labelledby='flush-headingOne' data-bs-parent='#accordionFlushExample'>
                <div class='accordion-body'>
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
                                <td>{$costo_tot} €</td>
                            </tr>
                        </tbody>
                    </table>             
                </div>
                </div>
            </div>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='headingTwo'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
                    METODO PAGAMENTO
                </button>
                </h2>
                <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                    <label class='form-check-label' for='flexRadioDefault1'>
                    Pagamento alla Consegna
                    </label>
                </div>
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault2' data-bs-toggle='modal' data-bs-target='#cardmodal' {$is_checked}>
                    <label class='form-check-label' for='flexRadioDefault2'>
                    Pagamento tramite Carta
                    </label>
                </div>
                <div class='modal fade' id='cardmodal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Inserisci Metodo Pagamento</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            {$modal_content}
                    </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='flush-headingThree'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapseThree' aria-expanded='false' aria-controls='flush-collapseThree'>
                    INDIRIZZO DI CONSEGNA
                </button>
                </h2>
                <div id='flush-collapseThree' class='accordion-collapse collapse' aria-labelledby='flush-headingThree' data-bs-parent='#accordionFlushExample'>
                    <div class='container'>
                            <div class='card-body'>
                                Città: {$ris_ind_finale['citta']}<br>
                                CAP: {$ris_ind_finale['CAP']}<br>
                                via: {$ris_ind_finale['via']}<br>
                                numero civico: {$ris_ind_finale['num_civico']}<br>
                            </div>    
                    </div>
                </div>
            </div>
            </div>
        ";

        $table .= "</tbody></table>";

        $body = "
            <div class='first-item'>
                <div class='row'>
                    <div class='col-md-6'>{$table}</div>
                    <div class='col-md-1'></div>
                    <div class='col-md-5'>
                        {$riep_table}
                        <div class='d-flex'>
                            <div class='d-flex justify-content-end'>
                                <div class='mr-auto p-2'><a href='../../index.php' type='button' class='btn btn-outline-danger'>Annulla Ordine</a></div>
                                <div class='p-2'><a href='./fordine.php?np={$num_prodotti}&nti={$num_tot_item}&ct={$costo_tot}' type='button' class='btn btn-outline-success'>Completa Ordine</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }

    $html = "
        <html>
            <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
            <script src='../../js/main.js'></script>
            <link rel='stylesheet' href='../../style/style.css'>
            <title>GoMarket</title>
            </head>
            <body>
                {$nav}
                <div class='container-lg'>{$body}</div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>
            </body>
        </html>    
    ";

    print_r($html);
?>