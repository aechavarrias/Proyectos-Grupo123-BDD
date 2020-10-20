<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	#$tipo = $_POST["tipo_elegido"];
	$nombre = $_POST["nombre"];

 	$query = "SELECT nombre FROM personal";
	#WHERE tipo LIKE '%$tipo%' AND nombre LIKE '%$nombre%';";
	$result = $db1 -> prepare($query);
	$result -> execute();
	$personal = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($personal as $asd) {
  		echo "<tr> <td>$asd[0]</td> <td>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
