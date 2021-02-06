<?php
    session_start();
    include("../method/funzioni.php");

    $sql = "SELECT * FROM utente WHERE ID = {$_SESSION['ID_CLIENTE']}";
    $risultato = connessione($sql, "gomarket");
    $ris = $risultato[0];

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

    $pass = "";
    for($i = 0; $i < strlen($ris['pwd']); $i++) {
       $pass .= "*";
    }

    $body = "
        <div class='container'>
            <table class='table'>
                <tbody>
                    <tr>
                        <th scope='row'>NOME</th>
                        <td>{$ris['nome']}</td>
                        <td><a href='./modifica.php?idcliente={$ris['ID']}&campo=nome'>modifica</a></td>
                    </tr>
                    <tr>
                        <th scope='row'>COGNOME</th>
                        <td>{$ris['cognome']}</td>
                        <td><a href='./modifica.php?idcliente={$ris['ID']}&campo=cognome'>modifica</a></td>
                    </tr>
                    <tr>
                        <th scope='row'>USERNAME</th>
                        <td>{$ris['nome_utente']}</td>
                        <td><a href='./modifica.php?idcliente={$ris['ID']}&campo=username'>modifica</a></td>
                    </tr>
                    <tr>
                        <th scoper='row'>EMAIL</th>
                        <td>{$ris['indirizzo_email']}</td>
                        <td><a href='./modifica.php?idcliente={$ris['ID']}&campo=email'>modifica</a></td>
                    </tr>
                    <tr>
                        <th scoper='row'>PASSWORD</th>
                        <td>$pass</td>
                        <td><a href='./modifica.php?idcliente={$ris['ID']}&campo=pwd'>modifica</a></td>
                    </tr>
                    <tr>
                        <th scope='row'>DATA DI NASCITA</th>
                        <td>{$ris['data_di_nascita']}</td>
                        <td><a href='./modifica.php?idcliente={$ris['ID']}&campo=dataNascita'>modifica</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    ";

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
                    {$body}
                </div>
            </body>
        </html>    
    ";

    print_r($html);
?>