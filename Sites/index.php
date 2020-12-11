<?php 
  session_start();
  $_SESSION["ingresar"] = "INRESAR";
  include('templates/header.html'); 
?>

<body>
<br/><br/>
  <h1 align="center" href="#ingresar" id="ingresar">INGRESAR</h1>
  <p style="text-align:center;" class="section-subheading text-muted" >Ingresa tus datos para acceder!</p>

  <br>
  
  <form align="center" action="ingreso/ingresar.php" method="post">
    <div class="text-center">
    <div class="row align-items-stretch mb-5">
      <div class="col-md-6">
        
        <div class="form-group">
            <input class="form-control" id="pasaporte" name="pasaporte" type="text" placeholder="Número pasaporte *" required="required" data-validation-required-message="Por favor ingresa tu pasaporte" />
            <p class="help-block text-danger"></p>
        </div>
        
        <div class="form-group">
          <input class="form-control" id="contraseña" name="pass" type="text" placeholder="Contraseña *" required="required" data-validation-required-message="Por favor ingresa tu contraseña" />
          <p class="help-block text-danger"></p>
        </div>  

      </div>            
    </div>

    <div class="text-center">
        <div id="success"></div>
        <button class="btn btn-primary btn-xl text-uppercase" id="ingresar" type="submit">Ingresar</button>
    </div>
    
  </form>
  <br>
  <br>
  <br>
  <br/><br/>
  <h1 align="center" href="#registrar" id="registrar" >REGISTRATE </h1>
  <p style="text-align:center;" class="section-subheading text-muted">Ingresa tus datos para registrarte!</p>

  <br>
  
  <form align="center" action="consultas/consulta_registro.php" method="post">
  <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <div class="form-group">
            <input class="form-control" id="nombre" type="text" name="unombre" placeholder="nombre *" required="required" data-validation-required-message="Por favor ingresa tu nombre" />
            <p class="help-block text-danger"></p>
        </div>
        <div class="form-group">
          <input class="form-control" id="edad" type="number" name="uedad" placeholder="edad *" required="required" data-validation-required-message="Por favor ingresa tu edad" />
          <p class="help-block text-danger"></p>
        </div> 

        <select class="form-control" id="sexo" name="usexo">
          <option value="mujer" name="mujer" >Mujer</option>
          <option value="hombre" name="hombre" >Hombre</option>
          <option value="otro" name="otro" >Otro</option>
        </select>
        <div class="form-group">
          <input class="form-control" id="pasaporte" type="text" name="upasaporte" placeholder="pasaporte *" required="required" data-validation-required-message="Por favor ingresa tu número de pasaporte" />
          <p class="help-block text-danger"></p>
        </div>
        <div class="form-group">
          <input class="form-control" id="nacionalidad" type="text" name="unacionalidad" placeholder="nacionalidad *" required="required" data-validation-required-message="Por favor ingresa tu nacionalidad" />
          <p class="help-block text-danger"></p>
        </div>
        <div class="form-group">
          <input class="form-control" id="contraseña" type="text" name="ucontraseña" placeholder="contraseña *" required="required" data-validation-required-message="Por favor ingresa tu contraseña" />
          <p class="help-block text-danger"></p>
        </div>                 
        </div>            
      </div>

    <div class="text-center">
        <div id="success"></div>
        <button value = "Registrar" class="btn btn-primary btn-xl text-uppercase" id="registrar" type="submit">Registrar</button>
    </div>
    <br/>
    <br/><br/>
  </form>
  
  <br>
  <br>
  <br>

  
  </form>
  <br>
  <br>
  <br>


</body>
<?php include('templates/footer.html');   ?>
</html>
