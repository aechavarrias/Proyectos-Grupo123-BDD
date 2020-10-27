<?php include('../templates/header_inicio.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  $nombre = $_POST["unombre"];
  $edad = $_POST["uedad"];
  $sexo = $_POST["usexo"];
  $pasaporte = $_POST["upasaporte"];
  $nacionalidad = $_POST["unacionalidad"];
  $contraseña = $_POST["ucontraseña"];
  

  $idQuery = "SELECT MAX(id) FROM usuarios;";
  $resultID = $db1 -> prepare($idQuery);
  $resultID -> execute();
  $maxId = $resultID -> fetchAll();

  $id = $maxId[0][0]+1;


  $passportQuery = "SELECT numero_pasaporte FROM usuarios WHERE numero_pasaporte LIKE '%$pasaporte%';";
  $passportResult = $db1 -> prepare($passportQuery);
  $passportResult -> execute();

  $checkAns = $passportResult -> fetchAll();
  if (empty($checkAns)) {
    
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
      echo('Usuario registrado correctamente. Vea su perfil <a href=../ingreso/perfil.php>AQUI</a>.');
  }
  else {
    echo('El pasaporte ingresado ya existe, corríjalo <a href=https://www.youtube.com/watch?v=dQw4w9WgXcQ>AQUI</a>.');
  }
  ?>