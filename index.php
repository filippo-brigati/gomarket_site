<?php
    include("./method/funzioni.php");
    session_start();

    if(isset($_SESSION["NOME"])) {
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
                        <a class='nav-link' href='./page/ordini.php'>ORDINI</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./page/profilo.php'>PROFILO</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./method/logout.php'>LOGOUT</a>
                    </li>                 
                    </ul>
                </div>
                </div>
            </nav>
        ";
        
        $welcome_banner = "<p class='subtitle fs-2 text-center'>Benvenuto {$_SESSION["NOME"]} sei pronto ad ordinare la tua prossima spesa?!<br></p>";
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
                        <a class='nav-link' href='./page/registrazione.php'>REGISTRATI</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./page/login.php'>ACCEDI</a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        ";

        $welcome_banner = "<p class='subtitle fs-2 text-center'>La spesa direttamente a casa tua<br></p>";
    }

    $img = "<img src='./assets/01.svg' class='img-fluid mx-auto d-block'>";

    $html = "
        <html>
            <head>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
            <link rel='preconnect' href='https://fonts.gstatic.com'>
            <link href='https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='./style/style.css'>
            <title>GoMarket</title>
            </head>
            <body>
                <div class='container-lg'>
                    {$nav}
                    <div class='row first-item'>
                    <div class='col-lg-6'>
                        {$welcome_banner}
                    </div>
                    <div class='col-lg-6'>{$img}</div>
                    </div>
                </div>
            </body>
        </html>    
    ";

    print_r($html);
?>