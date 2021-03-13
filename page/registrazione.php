<?php
    session_start();
    include("../method/funzioni.php");

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
                    <a class='nav-link active' href='./registrati.php'>REGISTRATI</a>
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
        <div class='container first-item'>
            <form class='row g-3'  name='registration' action='../method/registration_check.php' method='post'>
                <div class='col-md-6'>
                <label for='inputEmail4' class='form-label'>Nome</label>
                    <input type='text' class='form-control' name='nome_utente' placeholder='Mario' required>
                </div>
                <div class='col-md-6'>
                <label for='inputEmail4' class='form-label'>Cognome</label>
                    <input type='text' class='form-control' name='cognome_utente' placeholder='Rossi' required>
                </div>
                <div class='col-md-6'>
                <label for='inputEmail4' class='form-label'>Email</label>
                    <input type='email' class='form-control' name='email_utente' placeholder='esempio@email.it' required>
                </div>
                <div class='col-md-6'>
                    <label for='inputPassword4' class='form-label'>Password</label>
                    <input type='password' class='form-control' name='password_utente' placeholder='**********' required>
                </div>
                <div class='col-6'>
                    <label for='inputAddress2' class='form-label'>Nome Utente (username)</label>
                    <input type='text' class='form-control' name='username' placeholder='Mario_Rossi' required>
                </div>
                <div class='col-6'>
                    <label for='inputAddress2' class='form-label'>CODICE FISCALE</label>
                    <input type='text' class='form-control' name='cod_fiscale' placeholder='GRDK94VDJSJVN349P' required>
                </div>
                <div class='col-6'>
                    <label for='example-date-input' class='form-label'>Data Di Nascita</label>
                    <input class='form-control' type='date' value='2011-08-19' name='data_di_nascita' required>                 
                </div>
                <div class='col-6'>
                    <label for='inputAddress2' class='form-label'>RUOLO</label><br>
                    <select class='form-select' aria-label='Default select example' name='ruolo' required>
                        <option value='0'>CLIENTE</option>
                        <option value='1'>FATTORINO</option>
                    </select>                    
                </div>
                <div class='col-md-4'>
                    <label for='inputCity' class='form-label'>Citta</label>
                    <input type='text' class='form-control' name='regione_utente' placeholder='Reggio-Emilia' required>
                </div>
                <div class='col-md-4'>
                    <label for='inputState' class='form-label'>Via</label>
                    <input type='text' class='form-control' name='via_utente' placeholder='Via Roma' required>
                </div>
                <div class='col-md-2'>
                    <label for='inputZip' class='form-label'>CAP</label>
                    <input type='text' class='form-control' name='cap_utente' placeholder='42123' required>
                </div>                
                <div class='col-md-2'>
                    <label for='inputZip' class='form-label'>Numero Civico</label>
                    <input type='text' class='form-control' name='numero_civico_utente' placeholder='17' required>
                </div>
                <div class='col-12'>
                    <button type='submit' class='btn btn-primary'>Registrati</button>
                </div>
            </form>
        </div>
        </div>   
    ";

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