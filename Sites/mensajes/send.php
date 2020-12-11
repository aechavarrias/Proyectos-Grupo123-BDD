<?php 
    session_start();

    $msg = $_POST["message"]; 
    $to = $_POST["receptant"];
    $date = date("Y-m-d");

    $data = array(
        'message' => $msg,
        'sender' => intval($_SESSION["MongoID"]),
        'receptant' => intval($to),
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
?>
