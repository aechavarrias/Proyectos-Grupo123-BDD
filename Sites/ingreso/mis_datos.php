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

  $check = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '$pasaporte' AND contraseña LIKE '$contraseña';";
  $checkResult = $db1 -> prepare($check);
  $checkResult -> execute();

  $checkAns = $checkResult -> fetchAll();

  foreach ($checkAns as $ans) {
    echo "<tr> <td> $ans[0]</td> <td>$ans[1]</td> <td>$ans[2]</td> <td>$ans[3]</td> <td>$ans[4]</td> <td>$ans[5]</td> </tr> \n";
  }


  // $stmt->execute(array(':titulo' => $titulo, ':descricao' => $descricao, ':preco' => $preco));

  // $result -> execute($data);
  ?>