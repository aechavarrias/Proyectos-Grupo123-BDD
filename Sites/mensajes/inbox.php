<?php 
    session_start();
    include('../templates/header_inicio.html');
?>

<body>
<?php
    $uid = (string)$_SESSION["MongoID"];

    $data = array(
    'nombre' => $_SESSION["MongoID"],
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
    $result = file_get_contents( 'https://prometo-que-es-la-ultima.herokuapp.com/users/inbox/' . $uid, false, $context );
    $response = json_decode($result, true);
  ?>


<h1 align="center">Bandeja de Entrada</h1>
<table align="center">
<tr>
    <th>Fecha</th>
    <th>Emisor</th>
    <th>Mensaje</th>
    <th>MID</th>
    <th>LAT</th>
    <th>LONG</th>
</tr>
    <?php
        foreach ($response as $p) {
            $date       = $p["date"];
            $lat        = $p["lat"];
            $long       = $p["long"];
            $message    = $p["message"];
            $mid        = $p["mid"];
            $receptant  = $p["receptant"];
            $sender     = $p["sender"];

            echo "<tr> <td>$date</td> <td>$sender</td> <td>$message</td> <td>$mid</td> <td>$lat</td> <td>$long</td> </tr>";
        }
    ?>
</table>