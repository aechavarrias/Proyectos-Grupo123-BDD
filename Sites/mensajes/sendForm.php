<?php 
  session_start();
  include('../templates/header_inicio.html');
?>

<body>
<h1 align="center" href="#enviar" id="enviar" >ENVÍA UN MENSAJE </h1>

  <br>
  
  <form align="center" action="../mensajes/send.php" method="post">
  <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <div class="form-group">
            <input class="form-control" id="receptant" type="number" name="receptant" placeholder="ID Receptor *" required="required" data-validation-required-message="Por favor ingresa tu nombre" />
            <p class="help-block text-danger"></p>
        </div>
        <div class="form-group">
          <input class="form-control" id="message" type="text" name="message" placeholder="Mensaje *" required="required" data-validation-required-message="Por favor ingresa tu edad" />
          <p class="help-block text-danger"></p>
        </div> 
           
        </div>            
      </div>

    <div class="text-center">
        <div id="success"></div>
        <button value = "Enviar" class="btn btn-primary btn-xl text-uppercase" id="Enviar" type="submit">Enviar</button>
    </div>
    <br/>
    <br/><br/>
  </form>

</body>
</html>
