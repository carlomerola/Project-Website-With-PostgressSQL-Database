<?php

    // Controllo campo username vuoto
	if( empty(trim($_POST['username'])) ){
        echo "<span class=\"testo\"><p>INSERIRE USERNAME</p></span>";
    }

    // Controllo campo password vuoto
    if( empty(trim($_POST['password'])) ){
        echo "<span class=\"testo\"><p>INSERIRE PASSWORD</p></span>";
    }

    //se credenziali non vuote registra utente
    if( !empty(trim($_POST['username'])) && !empty(trim($_POST['password'])) ){

    	$username = trim($_POST['username']);
     	$password = trim($_POST['password']);

      //applico funzione di hash alla password per non salvarla in chiaro nel database
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    	require_once 'dbConn.php';
    	$query = "INSERT INTO Utente (Username, Password)
    			      VALUES ('$username', '$hashed_password') ";
    	$result = mysqli_query($conn, $query);

    	//se result non dà errore reindirizzo al login
    	if($result){

        mysqli_close($conn);
    		header('Location: ../shop.php');

    	} else {

    		echo "<span class=\"testo\"><p>Username già esistente.</p></span>";

    	}
    }

?>

<html>
  <head>

  <title>Registrati</title>

  <link rel="stylesheet" media="all" href="../assets/css/main.css" />
  <link rel="stylesheet" media="all" href="../assets/bootstrap/css/bootstrap.css" />
  <script src="../assets/js/jquery-2.2.0.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class="container">
      <div class="row">

        <div class="POP" style="margin-bottom: 50px;"><h2>Registrati</h2></div>

        <form action="register.php" method="post">
          <div class="form-group">
            <label for="InputEmail">Email address</label>
            <input type="email" name="username" class="form-control" id="InputEmail" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password">
          </div>

          <button type="submit" class="btn btn-warning">Registrati</button>
        </form>

      </div>
    </div>

</body>
</html>