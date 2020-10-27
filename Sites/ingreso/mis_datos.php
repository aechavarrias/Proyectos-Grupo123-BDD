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
  $pasaporte = $_POST["upasaporte"];
  $contraseña = $_POST["ucontraseña"];
  
  #$checkID = "SELECT MAX(id) FROM usuarios;";

  $check = "SELECT numero_pasaporte, contraseña FROM usuarios WHERE numero_pasaporte LIKE '%$pasaporte%' AND contraseña LIKE '%$contraseña%';";
  $checkResult = $db1 -> prepare($check);
  $checkResult -> execute();

  $checkAns = $checkResult -> fetchAll();
  if (empty($checkAns)) {

    echo("Ya existe un usuario con ese numero de pasaporte.");
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    exit();
      
  }
  else {
    $result = $db1 -> prepare($query);
    
    $result -> bindValue(':id', $id); 
    $result -> bindValue(':pasaporte', $pasaporte);
    $result -> bindValue(':pword', $contraseña);
    $result -> execute();

    $usuarios = $result -> fetchAll();
    header("Location: ../ingreso/perfil.php");
    exit();
  }



  // $stmt->execute(array(':titulo' => $titulo, ':descricao' => $descricao, ':preco' => $preco));

  // $result -> execute($data);
  ?>