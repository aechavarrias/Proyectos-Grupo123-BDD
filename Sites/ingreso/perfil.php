<?php 
  include('../templates/header_inicio.html');
  session_start();
?>



<body>
<br/><br/>
  <h1 align="center"><?php echo $_SESSION["ingresar"];?></h1>
  <div class="container">
  <form action="../navegacion/mis_datos.php" method="post">
    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" id="perfil" value="ver_perfil" type="submit">Mi perfil</button>
    </div>
    <br/>
    <br/><br/>
  </form>

  <br/><br/>

  <form action="../consultas/consulta_navieras.php" method="post">
  <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" value="ver_navieras" id="navieras" type="submit">Ver Navieras</button>
    </div>
    <br/>
    <br/><br/>
  </form>

  <br/><br/>

  <form action="../consultas/consulta_puertos.php" method="post">
  <div class="text-center">
    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" value="ver_puertos" id="puertos" type="submit">Ver Puertos</button>
    </div>
    <br/>
    <br/><br/>
    </form>
    </div>
  <br>
  <br>
  <br>
<body>
</html>