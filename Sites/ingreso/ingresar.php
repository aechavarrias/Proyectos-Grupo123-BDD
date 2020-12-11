<?php 
  session_start();

  require("../config/conexion.php");

  $user = $_POST["pasaporte"];
  $pass = $_POST["pass"];

  // $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '$user';";
  echo "er1234 = $user";
  $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '$user';";
  $userResult = $db1 -> prepare($userQuery);
  $userResult -> execute();
  $usuario = $userResult -> fetchAll();

  // if ($pass == $usuario) {
  //   code to be executed if condition is true;
  // } else {
  //   code to be executed if condition is false;
  // }
  // include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>

<body>
</body>
</html>