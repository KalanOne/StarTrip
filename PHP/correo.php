<?php

$mensaje = $_POST['mensaje'];
$asunto = $_POST['asunto'];
$email = $_POST['email'];
$header = $_POST['header'];

$header = $header . "X-Mailer: PHP/ " . phpversion();

$mail = mail($email, $asunto, $mensaje, $header);

echo "Exitoso";