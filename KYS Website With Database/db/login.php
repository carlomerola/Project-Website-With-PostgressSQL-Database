<?php 

    //Controllo username vuoto
    if( empty(trim($_POST['username'])) ){
        echo "<span class=\"testo\"><p>INSERIRE USERNAME</p></span>";
    }

    //Controllo campo password vuoto
    if( empty(trim($_POST['password'])) ){
        echo "<span class=\"testo\"><p>INSERIRE PASSWORD</p></span>";
    }

    //verifica corrispondenza
    if( !empty($_POST['username']) && !empty($_POST['password'] ) ){
      
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      //connsessione al database
      require_once 'dbConn.php';


      $query = "SELECT ID, Username, Password FROM Utente WHERE Username = '$username'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);

      //Utilizzo funzione di verifica password hash. Se non corrispondono segnalo all'utente di registrarsi
      if( !password_verify($password, $row['Password']) ){

        echo "<span class=\"testo\"><p>CREDENZIALI NON CORRETTE. Registrati o ritenta.</p></span>";

      } else {

        //assegno variabili di sessione e reindirizzo
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location: ../shop.php');

      }

    }


?>

<html>
  <head>

  <title>Login page</title>

  <link rel="stylesheet" media="all" href="../assets/css/main.css" />
  <link rel="stylesheet" media="all" href="../assets/bootstrap/css/bootstrap.css" />
  <script src="../assets/js/jquery-2.2.0.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class="container">
      <div class="row">

        <div class="text-right" style="margin-top: 15px"><a href="register.php" style="color: black;"> Registrati invece</a></div>
        <div class="POP" style="margin-bottom: 50px;"><h2>Accedi</h2></div>

        <form action="login.php" method="post">
          <div class="form-group">
            <label for="InputEmail">Email address</label>
            <input type="email" name="username" class="form-control" id="InputEmail" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password">
          </div>

          <button type="submit" class="btn btn-warning">Invia</button>
        </form>

      </div>
    </div>

</body>
</html>