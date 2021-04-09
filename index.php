<?php
    include("./method/funzioni.php");
    session_start();

    if(isset($_SESSION["NOME"])) {
        if($_SESSION["RUOLO"] == 0) {
            $nav = "
                <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                    <div class='container'>
                    <a class='navbar-brand' href='./index.php'>GOMARKET</a>
                    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
                        <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a class='nav-link' href='./page/cliente/nordine.php'>ORDINE</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./page/cliente/registro.php'>REGISTRO</a>
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

            $body = "
            <div class='row d-flex align-items-center pt-4'>
                <div class='col-md-5'>
                    <h1>Bentornato {$_SESSION["NOME"]}! Pronto ad Ordinare la tua prossima spesa?!</h1>
                    <div class='pt-3'><a href='./page/cliente/nordine.php' type='button' class='btn btn-outline-primary btn-lg'>Nuovo Ordine</a></div>
                </div>
                <div class='col-lg-1'></div>
                <div class='col-md-6'>
                    <img src='./assets/14.svg' class='img-fluid mx-auto d-block'>
                </div>
            </div>
            <div class='row d-flex align-items-center pt-4'>
                <div class='col-md-6'>
                    <img src='./assets/15.svg' class='img-fluid mx-auto d-block'>
                </div>
                <div class='col-lg-1'></div>
                <div class='col-md-5'>
                    <h3>Visualizza i prodotti disponibili, puoi scegliere tra diversi supermercati per trovare i prezzi migliori e le marche più adatte a te!</h3>
                    <div class='pt-3'><a href='./page/cliente/prodotti.php' type='button' class='btn btn-outline-primary btn-lg'>Visualizza Prodotti</a></div>
                </div>
            </div>
            ";
        }else {
            $nav = "
                <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                    <div class='container'>
                    <a class='navbar-brand' href='./index.php'>GOMARKET</a>
                    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
                        <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a class='nav-link' href='./page/fattorino/portafoglio.php'>SALDO</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./page/fattorino/nconsegna.php'>CONSEGNA</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./page/fattorino/registroconsegne.php'>REGISTRO</a>
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
            
            $body = "
                <div class='row d-flex align-items-center pt-4'>
                    <div class='col-md-5'>
                        <h1>Bentornato {$_SESSION["NOME"]}! Pronto a guadagnare consegnando la tua prossima spesa?!</h1>
                        <div class='pt-3'><a href='./page/cliente/nordine.php' type='button' class='btn btn-outline-primary btn-lg'>Visualizza Saldo</a></div>
                    </div>
                    <div class='col-lg-1'></div>
                    <div class='col-md-6'>
                        <img src='./assets/20.svg' class='img-fluid mx-auto d-block'>
                    </div>
                </div>
                <div class='row d-flex align-items-center pt-4'>
                    <div class='col-md-6'>
                        <img src='./assets/21.svg' class='img-fluid mx-auto d-block'>
                    </div>
                    <div class='col-lg-1'></div>
                    <div class='col-md-5'>
                        <h3>Visualizza le richieste di consegna più vicine a te! Oppure esplora ordini più distanti!</h3>
                        <div class='pt-3'><a href='' type='button' class='btn btn-outline-primary btn-lg'>Visualizza Richieste</a></div>
                    </div>
                </div>
                <div class='row d-flex align-items-center pt-4'>
                    <div class='col-md-5'>
                        <h2>{$_SESSION["NOME"]} ricorda di mantenere le distanze e di non entrare in contatto con il cliente!</h2>
                    </div>
                    <div class='col-lg-1'></div>
                    <div class='col-md-6'>
                        <img src='./assets/22.svg' class='img-fluid mx-auto d-block'>
                    </div>
                </div>
            ";
        }

    }else {
        $nav = "
            <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-white'>
                <div class='container'>
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
        $body = "
            <div class='row d-flex align-items-center pt-4'>
                <div class='col-md-5'>
                    <h1>Benvenuto su Gomarket! Pronto ad Ordinare la tua prossima spesa?!</h1>
                    <div class='pt-3'><a href='./page/login.php' type='button' class='btn btn-outline-primary btn-lg'>Ordina Ora</a></div>
                </div>
                <div class='col-lg-1'></div>
                <div class='col-md-6'>
                <img src='./assets/10.svg' class='img-fluid mx-auto d-block'>
                </div>
            </div>
            <div class='container row d-flex align-items-center pt-4'>
                <div class='col-md-4'>
                    <div class='card border-light mb-3'>
                        <img src='./assets/11.svg' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h4 class='text-center'>VELOCE</h4>
                        </div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='card border-light mb-3'>
                        <img src='./assets/12.svg' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h4 class='text-center'>SICURO</h4>
                        </div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='card border-light mb-3'>
                        <img src='./assets/13.svg' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h4 class='text-center'>SEMPLICE</h4>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }

    $footer = "
    <footer class='text-center text-lg-start' style='background-color: rgb(102, 106, 246)'>
      <div class='container p-4'>
        <div class='container row text-light'>
          <div class='col-lg-6 col-md-12 mb-4 mb-md-0'>
            <h5 class='text-uppercase'>Footer Content</h5>
            <p>
                Ciao!
            </p>
          </div>
          <div class='col-lg-3 col-md-6 mb-4 mb-md-0'>
            <h5 class='text-uppercase'>Links</h5>
            <ul class='list-unstyled mb-0'>
              <li>
                <a href='#!' class='text-dark'>Link 1</a>
              </li>
              <li>
                <a href='#!' class='text-dark'>Link 2</a>
              </li>
              <li>
                <a href='#!' class='text-dark'>Link 3</a>
              </li>
              <li>
                <a href='#!' class='text-dark'>Link 4</a>
              </li>
            </ul>
          </div>
          <div class='col-lg-3 col-md-6 mb-4 mb-md-0'>
            <h5 class='text-uppercase mb-0'>Links</h5>
            <ul class='list-unstyled'>
              <li>
                <a href='#!' class='text-dark'>Link 1</a>
              </li>
              <li>
                <a href='#!' class='text-dark'>Link 2</a>
              </li>
              <li>
                <a href='#!' class='text-dark'>Link 3</a>
              </li>
              <li>
                <a href='#!' class='text-dark'>Link 4</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    ";

    $html = "
        <html>
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                <script src='./js/main.js'></script>
                <link rel='stylesheet' href='./style/style.css'>
                <title>GoMarket</title>
            </head>
            <body>
                {$nav}
                <div class='container'><div class='container'>{$body}</div></div>
                {$footer}
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>
            </body>
        </html>    
    ";

    print_r($html);
?>