<?php 
  session_start();

  require("../config/conexion.php");

  $user = $_POST["pasaporte"];
  $pass = $_POST["pass"];

  // $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '$user';";
  $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '$user';";
  $userResult = $db1 -> prepare($userQuery);
  $userResult -> execute();
  $usuario = $userResult -> fetchAll();

  if ($user == $usuario[0][4] and $pass == $usuario[0][6]) {
    $_SESSION["loggged"] = TRUE;
    $_SESSION["username"] = $usuario[0][1];
    // WEVIAR A MONGO / HEROKU
    $_SESSION["MongoID"] = 0;
    header("Location: ../consultas/perfil.php");
  } else {
    header("Location: http://twitter.com/");
  }
  // include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>

<body>
</body>
</html>