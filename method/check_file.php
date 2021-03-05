<?php
    session_start();
    include("./funzioni.php");

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', true);

    require_once __DIR__.'/SimpleXLSX.php';

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
                        <a class='nav-link' href='../page/registrazione.php'>REGISTRATI</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../page/login.php'>ACCEDI</a>
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
    }else {
        if(!isset($_FILES["file"])) {
            print_r("<p>file non selezionato</p>");
        }else {
            if($_FILES["file"]["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                print("<p>ERRORE NELL'ESTENSIONE DEL FILE</p>");
            }else if($_FILES["file"]["size"] > 10000) {
                print("<p>ERRORE NELLA DIMENSIONE DEL FILE</p>");
            }else {
                $file_name = $_FILES['file']['name'];
                $tmp_name = $_FILES['file']['tmp_name'];
                $local_file = "../dir/";

                move_uploaded_file($tmp_name, $local_file.$file_name);

                if ( $xlsx = SimpleXLSX::parse('../dir/spesa_pw.xlsx') ) {
                    $dim = $xlsx->dimension();
                    $num_cols = $dim[0];
                    $num_rows = $dim[1];

                    //Header Row
                    $header_values = $rows = [];

                    foreach($xlsx->rows() as $k => $r) {
                        if ( $k === 0 ) {
                            $header_values = $r;
                            continue;
                        }
                        $rows[] = array_combine( $header_values, $r );
                    }
                    print_r($rows);
                } else {
                    echo SimpleXLSX::parseError();
                }

                $_SESSION["nordine"] = $rows;
                header("Location: ../page/cliente/nordine-1.php");
            }
        }
    }

?>