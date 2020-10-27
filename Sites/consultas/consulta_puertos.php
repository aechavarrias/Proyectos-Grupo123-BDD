<?php include('../templates/header_inicio.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT * FROM puerto";
	$result = $db -> prepare($query);
	$result -> execute();
	$puerto = $result -> fetchAll();
  ?>



	<table>
    <tr>
	  <th>Id</th>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($puerto as $p) {
		echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
	  }
  ?>
	</table>