<?php
    session_start();
    include("../method/funzioni.php");
    
    if(!isset($_SESSION["NOME"])) {
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
                        <a class='nav-link' href='./registrazione.php'>REGISTRATI</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./login.php'>ACCEDI</a>
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
    }else {
        $sql = "SELECT * FROM utente u, indirizzo i WHERE u.ID = {$_SESSION['ID_CLIENTE']} AND i.fk_id_utente = u.ID";
        $risultato = connessione($sql, "gomarket");
        $ris = $risultato[0];
    
        if($ris["ruolo"] == 0) {
            $sel_zero = "selected";
            $sel_uno = "";
        }else {
            $sel_uno = "selected";
            $sel_zero = "";
        }
    
        if($_SESSION["RUOLO"] == 0) {
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
                            <a class='nav-link' href='./cliente/nordine.php'>ORDINE</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./cliente/registro.php'>REGISTRO</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' href='./profilo.php'>PROFILO</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='../method/logout.php'>LOGOUT</a>
                        </li>                 
                        </ul>
                    </div>
                    </div>
                </nav>
            ";
        }else {
            $nav = "
                <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                    <div class='container-fluid'>
                    <a class='navbar-brand' href='./index.php'>GOMARKET</a>
                    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
                        <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a class='nav-link' href='./fattorino/portafoglio.php'>PORTAFOGLIO</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./fattorino/nconsegna.php'>NUOVA_CONSEGNA</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./fattorino/registroconsegne.php'>REGISTRO_CONSEGNE</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./profilo.php'>PROFILO</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='../method/logout.php'>LOGOUT</a>
                        </li>                 
                        </ul>
                    </div>
                    </div>
                </nav>
            ";
        }
    
        $body = "
            <div class='container first-item'>
                <div class='row container'>
                    <div class='col-6'>
                        <img src='../assets/03.svg' class='img-fluid mx-auto d-block'>
                    </div>
                    <div class='col-6'>
                        <form name='update_form' action='../method/update_profile.php' method='post'>
                            <div class='row container'>
                                <div class='col-1'></div>
                                <div class='col-11'>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='nome_utente' value='{$ris["nome"]}'>
                                        <label for='floatingInput'>Nome:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='cognome_utente' value='{$ris["cognome"]}'>
                                        <label for='floatingInput'>Cognome:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='email' class='form-control' name='email_utente' value='{$ris["indirizzo_email"]}'>
                                        <label for='floatingInput'>Indirizzo Email:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='password' class='form-control' name='password_utente' value='{$ris["pwd"]}' disabled>
                                        <label for='floatingInput'>Password:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='username' value='{$ris["nome_utente"]}'>
                                        <label for='floatingInput'>Username:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='cod_fiscale' value='{$ris["codice_fiscale"]}'>
                                        <label for='floatingInput'>Codice Fiscale:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='date' class='form-control' name='data_di_nascita' value='{$ris["data_di_nascita"]}'>
                                        <label for='floatingInput'>Data Di Nascita:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <select class='form-select' aria-label='Floating label select example' name='ruolo'>
                                        <option value='0' {$sel_zero}>CLIENTE</option>
                                        <option value='1' {$sel_uno}>FATTORINO</option>
                                        </select>
                                        <label for='floatingSelect'>Ruolo:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='regione_utente' value='{$ris["citta"]}'>
                                        <label for='floatingInput'>Città:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='cap_utente' value='{$ris["CAP"]}'>
                                        <label for='floatingInput'>CAP:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='via_utente' value='{$ris["via"]}'>
                                        <label for='floatingInput'>Via:</label>
                                    </div>
                                    <div class='form-floating mb-3'>
                                        <input type='text' class='form-control' name='numero_civico_utente' value='{$ris["num_civico"]}'>
                                        <label for='floatingInput'>Numero Civico:</label>
                                    </div>
                                    <button type='submit' class='btn btn-primary'>Aggiorna Profilo</button>
                                </div>
                            </div>
                        </form>
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
            <link rel='stylesheet' href='../style/style.css'>
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