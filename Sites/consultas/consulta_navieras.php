<?php include('../templates/header_inicio.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT * FROM navieras";
	$result = $db -> prepare($query);
	$result -> execute();
	$navieras = $result -> fetchAll();
  ?>



	<table>
    <tr>
	  <th>Id</th>
      <th>Nombre</th>
	  <th>Pais Origen</th>
	  <th>Giro</th>
    </tr>
  <?php
	foreach ($navieras as $p) {
		echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> </tr> \n";
		echo "<td><input type="submit" name="Ver busques" value="ver_buques"/></td> \n"; 
	}
  ?>
	</table>
