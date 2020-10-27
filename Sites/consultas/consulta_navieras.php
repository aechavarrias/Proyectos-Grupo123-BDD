<?php include('../templates/header_inicio.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	#$tipo = $_POST["tipo_elegido"];
	$nombre = $_POST["nombre"];

 	$query = "SELECT nombre FROM usuarios;";
	#WHERE tipo LIKE '%$tipo%' AND nombre LIKE '%$nombre%';";
	$result = $db1 -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($usuarios as $us) {
  		echo "<tr> <td>$us[0]</td> <td>";
	}
  ?>
	</table>
