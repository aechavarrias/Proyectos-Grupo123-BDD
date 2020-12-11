<?php 
  session_start();
  include('../templates/header_inicio.html');
?>

<body>
<h1 align="center" href="#buscar" id="buscar" >BUSCA UN MENSAJE</h1>

  <br>
  
  <form align="center" action="../mensajes/textSearchRes.php" method="post">
  <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <div class="form-group">
            <input class="form-control" id="sender" type="number" name="sender" placeholder="ID Emisor" data-validation-required-message="ID Emisor" />
            <p class="help-block text-danger"></p>
        </div>
        <div class="form-group">
          <input class="form-control" id="query" type="text" name="query" placeholder="Busqueda" data-validation-required-message='Text Search: "Juangui" es -feo ' />
          <p class="help-block text-danger"></p>
        </div> 
           
        </div>
      </div>

    <div class="text-center">
        <div id="success"></div>
        <button value = "Enviar" class="btn btn-primary btn-xl text-uppercase" id="Enviar" type="submit">Buscar</button>
    </div>
    <br/>
    <br/><br/>
  </form>

</body>
</html>
