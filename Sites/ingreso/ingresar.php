<?php 
  session_start();

  require("../config/conexion.php");

  $user = $_POST["pasaporte"];
  $pass = $_POST["contraseña"];

  $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '%$pasaporte%';";
  $userResult = $db1 -> prepare($userQuery);
  $userResult -> execute();
  $usuario = $userResult -> fetchAll();
  // include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>

<table>
    <tr>
      <th>Usuario</th>
    </tr>
  <?php
	foreach ($usuario as $asd) {
  		echo "<tr> <td>$asd[0]</td> <td>";
	}
  ?>
</table>

<body>
</body>
</html>