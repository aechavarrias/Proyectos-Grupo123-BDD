<?php 
  session_start();
  session_reset();
  include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>


<body>
<br/><br/>
  <h1 align="center">Login Fallido</h1>
  <div class="container">
  <form action="../index.php#ingresar" method="get">
    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" id="HOME" value="HOME" type="submit">Volver al Inicio</button>
    </div>
    <br/>
    <br/><br/>
  </form>

<body>
</html>