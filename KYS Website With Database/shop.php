<?
	session_start();
	// verifica utente
	$lggd = $_SESSION['logged'];

	if( !isset($lggd) || empty($lggd) ){
		header('Location: http://localhost/progetto_y/db/login.php');
		exit();

	}

	require_once 'db/dbConn.php';

?>

<!DOCTYPE HTML>
<html lang="it">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kundalini Yoga Siena - Shop</title>

	<!-- css -->
	<link rel="stylesheet" media="all" href="assets/css/main.css" />

	<!-- librerie bootsrap -->
	<link rel="stylesheet" media="all" href="assets/bootstrap/css/bootstrap.css" />
	<script src="assets/js/jquery-2.2.0.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!--<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>-->

	<!-- google fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700" />

</head>

<body>

	<!-- logo e menù di navigazione -->
	<header>
		<div class="container">
			<div class="row">

				<div class="text-right col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px">
					<a href="db/logout.php" style="color: black;">Logout</a>
				</div>

				<div class="hidden-xs col-xl-2 col-lg-2 col-md-2 col-sm-2 margine_logo">
					<img src="assets/images/logo.png" alt="Logo Kundalini Yoga Siena - Alessandra Cota">
				</div>	
				<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

				<nav class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-10 navbar navbar-default" id="mainmenu">

					<div class="navbar-header">

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<span class="visible-xs navbar-brand">Kundalini Yoga Siena</span>
					</div>

					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="visible-xs" style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
			    				<img src="assets/images/logo_bg.png" alt="Logo Alessandra Cota Kundalini Yoga Siena" width="15%">
			    			</li>
			    			<li><a href="index.html">Home</a></li>
			    			<li><a href="chi_sono.html">Chi sono</a></li>
			    			<li><a href="lezioni.html">Lezione gratuita</a></li>
			    			<li><a href="shop.php">Shop</a></li>
  						</ul>
  					</div>
  				</nav>
  				<div class="col-xs-1"></div>
			</div>
		</div>
	</header>
	
	<div class="container">
		<div class="row">
	
			<div class="POP col-xl-12 col-lg-12 col-md-12"><h2>Sottoscrivi un abbonamento</h2></div>

			<?php

				//dichiaro la funzione di stampa del prezzo
				function Prezzo($abb_, $conn_){

					$query = "SELECT Prezzo FROM Abbonamento WHERE Tipo = '$abb_'";
					$result = mysqli_query($conn_, $query);
					$row = mysqli_fetch_assoc($result);
					$prezzo = $row['Prezzo'];

					echo "$prezzo €";

				}

				//dichiaro la funzione di stampa del numero di lezioni comprese nell'abbonamento.
				function Numero_Lezioni($abb_, $conn_){

					$query = "SELECT abbonamento.tipo, count(*) AS numero_lezioni
							  FROM abbonamento JOIN include ON abbonamento.tipo = include.tipoabbonamento 
							  WHERE abbonamento.tipo = '$abb_'
							  group by abbonamento.tipo";

				  	$result = mysqli_query($conn_, $query);
				  	$row = mysqli_fetch_assoc($result);
				  	$numero_lezioni = $row['numero_lezioni'];
				  	
				  	echo "Numero di lezioni: $numero_lezioni";
				  	
				}

			?>

			<div class="abbonamento col-xl-3 col-lg-3 col-md-3">
				<form action="sub.php" method="GET">
					<div class="panel panel-warning">
					  <div class="text-center panel-body">

					  	<input type="submit" name="sub" value="mensile">
					  	<br>
					  	<?php
					  		$abb = 'mensile';
					  		Prezzo($abb, $conn);
					  	?>

					  	<br>

					  	<?php Numero_Lezioni($abb, $conn); ?>

					  </div>
					</div>
				</form>
			</div>

			<div class="col-xl-1 col-lg-1 col-md-1"></div>

			<div class="abbonamento col-xl-3 col-lg-3 col-md-3">
				<form action="sub.php" method="GET">
					<div class="panel panel-warning">
						<div class="text-center panel-body">

							<input type="submit" name="sub" value="trimestrale">
							<br>
						  	<?php
						  		$abb = 'trimestrale';
						  		Prezzo($abb, $conn);
						  	?>

						  	<br>

						  	<?php Numero_Lezioni($abb, $conn); ?>

						</div>
					</div>
				</form>
			</div>

			<div class="col-xl-1 col-lg-1 col-md-1"></div>

			<div class="abbonamento col-xl-3 col-lg-3 col-md-3">
				<form action="sub.php" method="GET">
					<div class="panel panel-warning">
						<div class="text-center panel-body">

							<input type="submit" name="sub" value="annuale">
							<br>
						  	<?php
						  		$abb = 'annuale';
						  		Prezzo($abb, $conn);
						  	?>

						  	<br>

						  	<?php

							  	Numero_Lezioni($abb, $conn);


						  		/*$query_view = "CREATE VIEW mensile_annuale (tipo_abbonamento, prezzo)
											   AS SELECT tipo, abbonamento.prezzo * 12
											   FROM Abbonamento
											   WHERE tipo = 'Mensile'";

						  		$result = mysqli_query($conn, $query_view);


								$query =	"SELECT abbonamento.tipo, abbonamento.prezzo,
											(mensile_annuale.prezzo - abbonamento.prezzo) AS sconto_annuale,
											(100 - ((abbonamento.prezzo * 100)/mensile_annuale.prezzo)) AS percentuale
											FROM Abbonamento, mensile_annuale 
											WHERE abbonamento.tipo = 'Annuale'";
										
						  		$result = mysqli_query($conn, $query);
						  		$sconto = $row['percentuale'];
						  		echo "- $sconto %";*/
						  	?>

						</div>
					</div>
				</form>
			</div>
			
			<div class="col-xl-1 col-lg-1 col-md-1"></div>

		</div>
	</div>

</body>
</html>