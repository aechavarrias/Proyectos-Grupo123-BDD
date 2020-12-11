<?php 
    session_start();
    require("../config/conexion.php");

    $msg = $_POST["message"]; 
    $to = $_POST["receptant"];
    $date = date("Y-m-d");

    $data = array(
        'message' => $msg,
        'sender' => $_SESSION["MongoID"],
        'receptant' => $to,
        'lat' => -45.462659,
        'long' => -72.824656,
        'date' => (string)$date,
    );

    $options = array(
        'http' => array(
        'method'  => 'POST',
        'content' => json_encode( $data ),
        'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
        )
    );
    
    $context  = stream_context_create( $options );
    $result = file_get_contents( 'https://prometo-que-es-la-ultima.herokuapp.com/messages', false, $context );
    $response = json_decode($result, true);

    header("Location: ../mensajes/sent.php");

//     $_SESSION["MongoID"] = $response[0]['uid'];
//     header("Location: ../ingreso/perfil.php");
//   } else {
//     header("Location: ../ingreso/failedLogin.php");
//   }
  // include('../templates/header_inicio.html');
  // header("Location: http://google.com/");
?>

<body>