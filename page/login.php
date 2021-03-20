<?php
    session_start();
    include("../method/funzioni.php");

    if(isset($_SESSION["ERRORE_LOGIN"])) {
        $err = "<div class='alert alert-danger' role='alert'>ERRORE! Indirizzo email o password errate...riprova</div>";
    }else {
        $err = "";
    }

    if(isset($_SESSION["feed_rec_pwd"])) {
        $feed = $_SESSION["feed_rec_pwd"];
    }else {
        $feed = "";
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
        <div class='modal fade' id='resetpwd' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>RECUPERO PASSWORD</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <form name='recpwd' action='../method/rec_pwd.php' method='post'>
                <div class='modal-body'>
                    <div class='mb-3'>
                        <label for='exampleFormControlInput1' class='form-label'>Inserisci Indirizzo Mail</label>
                        <input type='email' class='form-control' id='exampleFormControlInput1' name='mail' placeholder='name@example.com'>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>CHIUDI</button>
                    <button type='submit' class='btn btn-primary'>CONFERMA</button>
                </div>
                </div>
            </form>
        </div>
        </div>
        <div class='row first-item'>
            <div class='col-lg-6 align-self-center'>
                <img src='../assets/19.svg'class='img-fluid mx-auto d-block'>
            </div>
            <div class='col-lg-6 align-self-center'>
                {$err}
                {$feed}
                <form name='login' action='../method/check.php' method='post'>
                    <div class='mb-3'>
                        <label for='formGroupExampleInput' class='form-label'>Inserisci Indirizzo Mail</label>
                        <input type='text' class='form-control' name='usr' placeholder='esempio@email.it'>
                    </div>
                    <div class='mb-3'>
                        <label for='formGroupExampleInput2' class='form-label'>Inserisci Password</label>
                        <input type='password' class='form-control' name='pwd' placeholder='password'>
                    </div>
                    <p>Hai dimenticato la Password? <a href='' type='button' data-bs-toggle='modal' data-bs-target='#resetpwd'> Clicca Qui!</a></p>
                    <button type='submit' class='btn btn-light'>ACCEDI</button>
                </form>
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
?>