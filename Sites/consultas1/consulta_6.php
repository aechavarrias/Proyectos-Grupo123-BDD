<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	#$tipo = $_POST["tipo_elegido"];
	$nombre = $_POST["nanombre"];

 	$query = "SELECT A.buid from pesca A inner join buques B on A.buid = b.buid WHERE B.num_personas = (select MAX(D.num_personas) FROM pesca C INNER JOIN buques D ON C.buid = D.buid)";
	#WHERE tipo LIKE '%$tipo%' AND nombre LIKE '%$nombre%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$navieras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($navieras as $naviera) {
  		echo "<tr> <td>$naviera[0]</td> <td>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>