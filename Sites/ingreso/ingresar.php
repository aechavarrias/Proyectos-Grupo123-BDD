<?php 
  session_start();

  require("../config/conexion.php");

  $user = $_POST["pasaporte"];
  $pass = $_POST["pass"];

  // $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '$user';";
  $userQuery = "SELECT * FROM usuarios WHERE numero_pasaporte LIKE '$user';";
  $userResult = $db1 -> prepare($userQuery);
  $userResult -> execute();
  $usuario = $userResult -> fetchAll();

  if ($user == $usuario[0][4] and $pass == $usuario[0][6]) {
    $_SESSION["loggged"] = TRUE;
    $_SESSION["username"] = $usuario[0][1];

    $data = array(
        'nombre' => $usuario[0][1],
    );

    $options = array(
        'http' => array(
        'method'  => 'GET',
        'content' => json_encode( $data ),
        'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
        )
    );
    
    $context  = stream_context_create( $options );
    $result = file_get_contents( 'https://prometo-que-es-la-ultima.herokuapp.com/users/nombre', false, $context );
    $response = json_decode($result, true);

    // $apiName = $response[0]['name'];
    // $apiId = $response[0]['uid'];

    echo "response = $response \n";
    echo "name = $response[0]['name'] \n";
    echo "ID = $response[0]['uid'] \n";

    // WEVIAR A MONGO / HEROKU
    $_SESSION["MongoID"] = 0;
    // header("Location: ../ingreso/perfil.php");
  } else {
    header("Location: http://twitter.com/");
  }
  // include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>

<body>
</body>
</html>