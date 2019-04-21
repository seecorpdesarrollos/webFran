<?php



  if (isset($_POST['name'])) {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $mensaje = $_POST['message'];


    $enviar_a = 'francescm@twittink.com';
    $asunto = 'Correo enviado desede mi pagina web twittink.com';
    $mensaje_a_preperar = "Nombre : $nombre \n";
    $mensaje_a_preperar .= "Correo : $email \n";
    $mensaje_a_preperar .= "Teléfono : $tel \n";
    $mensaje_a_preperar .= "Mensaje : . $mensaje ";

     mail($enviar_a, $asunto , $mensaje_a_preperar);



  }

 ?>
