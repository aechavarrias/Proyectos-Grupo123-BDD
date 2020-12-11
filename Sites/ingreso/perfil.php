<?php 
  session_start();
  include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>


<body>
<br/><br/>
  <h1 align="center">Bienvenid@ <?php echo $_SESSION["username"]; ?> de ID: <?php echo $_SESSION["MongoID"];?>  </h1>
  <div class="container">
  <form action="../mensajes/inbox.php" method="post">
    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" id="inbox" value="inbox" type="submit">Mensajes Recibidos</button>
    </div>
    <br/>
    <br/><br/>
  </form>

  <br/><br/>

  <form action="../mensajes/sent.php" method="post">
  <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" value="enviados" id="enviados" type="submit">Mensajes Enviados</button>
    </div>
    <br/>
    <br/><br/>
  </form>

  <br/><br/>

  <form action="../mensajes/sendForm.php" method="post">
  <div class="text-center">
    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" value="enviar" id="enviar" type="submit">Enviar Mensaje</button>
    </div>
    <br/>
    <br/><br/>
  
  </form>

  <br/><br/>

  <form action="../consultas/consulta_puertos.php" method="post">
  <div class="text-center">
    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" value="ver_puertos" id="puertos" type="submit">Buscar Mensaje Por Texto</button>
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