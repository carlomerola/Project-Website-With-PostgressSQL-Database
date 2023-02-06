<?php
	// connessione al database
	$dbmshost = 'localhost';
	$dbmsuser = 'root';
	$dbmspass = 'root';
	$dbname = 'progetto_y';

	$conn = mysqli_connect($dbmshost, $dbmsuser, $dbmspass, $dbname);

	// segnalazione errore di connsessione al database
	if(!$conn){
		echo "<h1>Database connection error</h1>".mysqli_connect_error();
	}

?>