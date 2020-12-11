<?php 
  session_start();
  include('/templates/header.html');
  // header("Location: http://google.com/");
?>


<body>
<br/><br/>
  <h1 align="center">Bienvenid@ <?php echo $_SESSION["username"]; ?> al centro especial de la PDI?  </h1>
  <div class="container">
  <form action="../mapa.php" method="post">
    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" id="inbox" value="inbox" type="submit">Ver Mapa</button>
    </div>
  </form>

<br/><br/>
<body>
</html>