<?php
    function connessione($sql, $base) {
		// testconnessione.php
		$conn = mysqli_connect("localhost", "root", "", $base);

		if(!$conn) {
			die(mysqli_connect_error());
		}
		// Controlla che la connessione sia stata stabilita correttamente
		if (($conn == false) ||  ($conn -> connect_errno)) {
			echo "Errore in connessione a MySQL";
			exit();
		}
		//echo "Connessione stabilita con successo";
		$resultset = $conn->query($sql);
		$righe = mysqli_fetch_all($resultset, MYSQLI_ASSOC);
		return $righe;        
	}

	function proteggi() {
		header("Location: login.php");
		exit();
	}

	function inserisci($sql, $base) {
		$conn = mysqli_connect("localhost", "root", "", $base);
		$conn->query($sql) or die($conn->error);
	}

    function stringarandom() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 6; $i++) {
			$flag = $characters[rand(0, strlen($characters))];
            $randstring .= $flag;
        }
        return $randstring;
	}
?>