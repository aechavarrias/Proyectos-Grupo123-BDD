<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Biblioteca Navieras </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre las navieras.</p>

  <br>

  <h3 align="center"> Registrate aquí </h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    Nombre:
    <input type="text" name="nombre_usuario">
    <br/>
    Edad:
    <input type="text" name="edad_usuario">
    <br/>
    Sexo:
    <select id="idsexo" name="idsexo">
      <option value="1">Femenino</option>
      <option value="1">Masculino</option>
      <option value="1">Otro</option>
    </select>
    <br/>
    <br/>
    Pasaporte:
    <input type="text" name="pasaporte_usuario">
    <br/>
    <br/>
    Nacionalidad:
    <input type="text" name="nacionalidad_usuario">
    <br/>
    <br/>
    Contraseña:
    <input type="text" name="contraseña_usuario">
    <br/>
    <br/><br/>
    <input type="submit" value="Registrar">
  </form>
  
  <br>
  <br>
  <br>
  
  <h3 align="center"> Ver todos los nombre del personal:</h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    <br/>
    <br/><br/>
    <input type="submit" value="Ver">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center">  Todos los buques de la naviera ‘Francis Drake S.A.’.</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Todos los buques que hayan atracado en ‘Valparaiso’ el 2020: </h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Todos los buques que hayan estado en ‘Mejillones’ al mismo tiempo que el
buque ‘Magnolia’.</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT tipo FROM pokemones;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_4.php" method="post">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>
  <br>
    <br>

  <h3 align="center"> Todos los capitanes mujeres que han pasado por el puerto ‘Talcahuano’.:</h3>

  <form align="center" action="consultas/consulta_5.php" method="post">
    <br/>
    <br/><br/>
    <input type="submit" value="Ver">
  </form>
  
  <br>
  <br>
  <br>
  <h3 align="center"> Buque pesquero que tiene más personas trabajando:</h3>

  <form align="center" action="consultas/consulta_6.php" method="post">
    <br/>
    <br/><br/>
    <input type="submit" value="Ver">
  </form>
  
  <br>
  <br>
  <br>


</body>
</html>
