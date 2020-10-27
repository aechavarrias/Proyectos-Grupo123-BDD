<?php include('../templates/header_inicio.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #$tipo = $_POST["tipo_elegido"];
  
  #$query = "SELECT nombre FROM usuarios;";
	#WHERE tipo LIKE '%$tipo%' AND nombre LIKE '%$nombre%';";
  #$result = $db1 -> prepare($query);
  #$result->bindParam(':id', $id);
  #$result->bindParam(':nombre', $nombre);
  #$result->bindParam(':edad', $edad);
  #$result->bindParam(':sexo', $sexo);
  #$result->bindParam(':pasaporte', $pasaporte);
  #$result->bindParam(':nacionalidad', $nacionalidad);
  #$result->bindValue(':contraseña', $contraseña);

  $id = 100;
  $nombre = $_POST["unombre"];
  $edad = $_POST["uedad"];
  $sexo = $_POST["usexo"];
  $pasaporte = $_POST["upasaporte"];
  $nacionalidad = $_POST["unacionalidad"];
  $contraseña = $_POST["ucontraseña"];
  // $nombre = "unombre";
  // $edad = "uedad";
  // $sexo = "usexo";
  // $pasaporte = "upasaporte";
  // $nacionalidad = "unacionalidad";
  // $contraseña = "ucontraseña";
  $data = [
    ':id' => $id,
    ':nombre' => $nombre,
    ':edad' => $edad,
    ':sexo' => $sexo,
    ':pasaporte' => $pasaporte,
    ':nacionalidad' => $nacionalidad,
    ':contraseña' => $contraseña,
  ];
  $query = "INSERT INTO usuarios (id, nombre, edad, sexo, numero_pasaporte, nacionalidad, contraseña) VALUES (:id, :nombre, :edad, :sexo, :pasaporte, :nacionalidad, :contraseña)"; 
  $result = $db1 -> prepare($query);
  
  $result -> execute($data);
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
