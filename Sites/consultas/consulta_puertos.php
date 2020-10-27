<?php include('../templates/header_inicio.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT * FROM puertos";
	$result = $db -> prepare($query);
	$result -> execute();
	$puertos = $result -> fetchAll();
  ?>



	<table>
    <tr>
	  <th>Id</th>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($puertos as $p) {
		echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
	  }
  ?>
	</table>