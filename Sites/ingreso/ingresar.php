<?php 
  session_start();
  $user = $_POST["pasaporte"];
  $pass = $_POST["contraseña"];

  $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '%$pasaporte%';";
  $userResult = $db1 -> prepare($userQuery);
  $userResult -> execute();
  $usuario = $userResult -> fetchAll();

  echo "$usuario";

//   $passportQuery = "SELECT numero_pasaporte FROM usuarios WHERE numero_pasaporte LIKE '%$pasaporte%';";
//   $passportResult = $db1 -> prepare($passportQuery);
//   $passportResult -> execute();


//   	#$tipo = $_POST["tipo_elegido"];
// 	$nombre = $_POST["nombre"];

//   $query = "SELECT nombre FROM personal";
//  #WHERE tipo LIKE '%$tipo%' AND nombre LIKE '%$nombre%';";
//  $result = $db1 -> prepare($query);
//  $result -> execute();
//  $personal = $result -> fetchAll();


  // include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>

<body>
</body>
</html>