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
  
  $checkID = "SELECT MAX(id) FROM usuarios;";

  $check = "SELECT numero_pasaporte FROM usuarios WHERE numero_pasaporte LIKE '%$pasaporte%';";
  $checkResult = $db1 -> prepare($check);
  $checkResult -> execute();

  $checkAns = $checkResult -> fetchAll();
  if (is_null($checkAns)) {
    
      $query = "INSERT INTO usuarios (id, nombre, edad, sexo, numero_pasaporte, nacionalidad, contraseña) VALUES (:id, :nombre, :edad, :sexo, :pasaporte, :nacionalidad, :pword)"; 
      $result = $db1 -> prepare($query);
      
      $result -> bindValue(':id', $id); 
      $result -> bindValue(':nombre', $nombre); 
      $result -> bindValue(':edad', $edad);
      $result -> bindValue(':sexo', $sexo);
      $result -> bindValue(':pasaporte', $pasaporte);
      $result -> bindValue(':nacionalidad', $nacionalidad);
      $result -> bindValue(':pword', $contraseña);
      $result -> execute();

      $usuarios = $result -> fetchAll();
      header("Location: ../ingreso/perfil.php");
      exit();
  }
  else {
    echo("Ya existe un usuario con ese numero de pasaporte.");
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    exit();
  }



  // $stmt->execute(array(':titulo' => $titulo, ':descricao' => $descricao, ':preco' => $preco));

  // $result -> execute($data);
  ?>