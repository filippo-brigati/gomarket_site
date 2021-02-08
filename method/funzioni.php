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

	function controllo($risultato, $arr) {
		foreach($risultato as $riga) {
			if($riga["indirizzo_email"] == $arr[2]) { return 1; }
			else { return 0; }
		}
	}

	function generazioneCodice ($length) {
		$salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012345678';
		$len = strlen($salt);
		$makepass = '';

		mt_srand(10000000*(double)microtime());

		for ($i = 0; $i < $length; $i++) { $makepass .= $salt[mt_rand(0,$len - 1)]; }
		return $makepass;
	}
?>