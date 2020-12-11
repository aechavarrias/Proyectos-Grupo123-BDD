<?php 
  session_start();

  require("../config/conexion.php");

  $user = $_POST["pasaporte"];
  $pass = $_POST["contraseña"];

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

<table>
    <tr>
      <th>Usuario</th>
    </tr>
  <?php
	foreach ($usuario as $asd) {
    echo "<tr><td>$asd[1]</td><td>$asd[4]</td><td>$asd[6]</td></tr>";
	}
  ?>
</table>

<body>
</body>
</html>