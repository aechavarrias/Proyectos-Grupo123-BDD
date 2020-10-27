<?php include('../templates/header_inicio.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	#$tipo = $_POST["tipo_elegido"];
	#$nombre = $_POST["nombre"];

 	$query = "SELECT * FROM navieras;";
	#WHERE tipo LIKE '%$tipo%' AND nombre LIKE '%$nombre%';";
	$result = $db1 -> prepare($query);
	$result -> execute();
	$navieras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
	  <th>Pais Origen</th>
	  <th>Giro</th>
	  <th>Nom</th>
    </tr>
  <?php
	foreach ($navieras as $p) {
		echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> </tr>";
	  }
  ?>
	</table>
