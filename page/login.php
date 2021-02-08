<?php
    session_start();
    include("../method/funzioni.php");

    if(isset($_SESSION["ERRORE_LOGIN"])) {
        $err = "border border-danger";
    }else {
        $err = "";
    }

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
                    <a class='nav-link active' href='./login.php'>ACCEDI</a>
                </li>
                </ul>
            </div>
            </div>
        </nav> 
    ";

    $body = "
        <div class='row first-item'>
            <div class='col-lg-6'>
                <img src='../assets/02.svg'class='img-fluid mx-auto d-block'>
            </div>
            <div class='col-lg-6 subtitle'>
                <form name='login' action='../method/check.php' method='post'>
                    <div class='mb-3'>
                        <label for='formGroupExampleInput' class='form-label'>Inserisci Indirizzo Mail</label>
                        <input type='text' class='form-control {$err}' name='usr' placeholder='esempio@email.it'>
                    </div>
                    <div class='mb-3'>
                        <label for='formGroupExampleInput2' class='form-label'>Inserisci Password</label>
                        <input type='password' class='form-control {$err}' name='pwd' placeholder='password'>
                    </div>
                    <button type='submit' class='btn btn-light'>ACCEDI</button>
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