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

  $pasaporte = $_POST["pasaporte"];
  $contraseña = $_POST["contraseña"];
  
  #$checkID = "SELECT MAX(id) FROM usuarios;";

  $check = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '%$pasaporte%' AND contraseña LIKE '%$contraseña%';";
  $checkResult = $db1 -> prepare($check);
  $checkResult -> execute();

  $checkAns = $checkResult -> fetchAll();
  echo "<tr> <td>$checkAns[0][0]</td> <td>$checkAns[0][1]</td> <td>$checkAns[0][2]</td> <td>$checkAns[0][3]</td> <td>$checkAns[0][4]</td> <td>$checkAns[0][5]</td> </tr>";



  // $stmt->execute(array(':titulo' => $titulo, ':descricao' => $descricao, ':preco' => $preco));

  // $result -> execute($data);
  ?>