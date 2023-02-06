<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" media="all" href="assets/css/main.css" />
</head>

</html>

<?php

	session_start();
	$user = $_SESSION['username'];
	$psw = $_SESSION['password'];
	$subscription = $_GET['sub'];

	require_once "db/dbConn.php";

	//ricavo l'id utente a partire dallo username
	$query = "SELECT Id FROM Utente WHERE Username = '$user'";
	$result = mysqli_query($conn, $query);

	//se c'è un errore l'utente viene reindirizzato dopo 2 secondi
	if(!$result){

		echo "<span class=\"testo\"><p>C'è stato un errore(1). Verrai reindirizzato allo shop.</p></span>";
		header('Refresh: 2; URL= shop.php');
		exit();

	}

	$row = mysqli_fetch_assoc($result);
	$Id = $row["Id"];

	//registro l'utente per l'abbonamento in questione
	$query = "INSERT INTO Sottoscrive VALUES ('$Id', '$subscription') ";
	$result = mysqli_query($conn, $query);

	//se !result errore, reindirizzo
	if(!$result){

		echo "<span class=\"testo\"><p>Ti sei già registrato per questo abbonamento. Verrai reindirizzato allo shop.</p></span>";
		header('Refresh: 2; URL= shop.php');
		exit();

	} else {

		//segnalo all'utente che ha effettuato l'abbonamento con successo,  e dopo 4 secondi reindirizzo alla home
		echo "<span class=\"testo\"><p>Ti sei registrato per l'abbonamento $subscription.</p></span>";

		//conto il numero di utenti che hanno sottoscritto questo abbonamento
		$query1 = "SELECT count(sottoscrive.utente) AS numero_abbonamenti
				   FROM utente JOIN sottoscrive ON sottoscrive.utente = utente.id
				   WHERE sottoscrive.tipoabbonamento = '$subscription'";

		$result1 = mysqli_query($conn, $query1);
		
		if(!$result1){
			echo "<span class=\"testo\"><p>C'è stato un errore e verrai riportato al negozio.</p></span>";
			header('Refresh: 2; URL= shop.php');
		}

		$row1 = mysqli_fetch_assoc($result1);

		$numero_abbonamenti = $row1['numero_abbonamenti'];
		echo "<span class=\"testo\"><p>Per questo abbonamento vi siete registrati in: $numero_abbonamenti</p></span>";

		mysqli_close($conn);
		header('Refresh: 4; URL= index.html');
	}

?>