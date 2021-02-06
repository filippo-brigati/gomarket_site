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
        <div class='container'>
            <form class='row g-3'>
                <div class='col-md-6'>
                <label for='inputEmail4' class='form-label'>Nome</label>
                    <input type='text' class='form-control' id='nome_utente' placeholder='Mario'>
                </div>
                <div class='col-md-6'>
                <label for='inputEmail4' class='form-label'>Cognome</label>
                    <input type='email' class='form-control' id='cognome_utente' placeholder='Rossi'>
                </div>
                <div class='col-md-6'>
                <label for='inputEmail4' class='form-label'>Email</label>
                    <input type='email' class='form-control' id='email_utente' placeholder='esempio@email.it'>
                </div>
                <div class='col-md-6'>
                    <label for='inputPassword4' class='form-label'>Password</label>
                    <input type='password' class='form-control' id='password_utente' placeholder='**********'>
                </div>
                <div class='col-6'>
                    <label for='inputAddress2' class='form-label'>Nome Utente (username)</label>
                    <input type='text' class='form-control' id='inputAddress2' placeholder='Mario_Rossi'>
                </div>
                <div class='col-6'>
                    <label for='inputAddress2' class='form-label'>CODICE FISCALE</label>
                    <input type='text' class='form-control' id='inputAddress2' placeholder='GRDK94VDJSJVN349P'>
                </div>
                <div class='col-md-4'>
                    <label for='inputCity' class='form-label'>Regione</label>
                    <input type='text' class='form-control' id='regione_utente' placeholder='Emilia-Romagna'>
                </div>
                <div class='col-md-4'>
                    <label for='inputState' class='form-label'>Via</label>
                    <input type='text' class='form-control' id='via_utente' placeholder='Via Roma'>
                </div>
                <div class='col-md-2'>
                    <label for='inputZip' class='form-label'>CAP</label>
                    <input type='text' class='form-control' id='cap_utente' placeholder='42123'>
                </div>                
                <div class='col-md-2'>
                    <label for='inputZip' class='form-label'>Numero Civico</label>
                    <input type='text' class='form-control' id='numero_civico_utente' placeholder='17'>
                </div>
                <div class='col-12'>
                    <button type='submit' class='btn btn-primary'>Sign in</button>
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