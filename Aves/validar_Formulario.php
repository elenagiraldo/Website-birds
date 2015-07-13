<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulario</title>
</head>

<body>
<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

if ($nombre == "") {
	echo "El campo nombre es obligatorio"."<br/>";
}else if ($email == "") {
	echo "El campo email es obligatorio"."<br/>";
}else if ($mensaje == "") {
	echo "El campo mensaje es obligatorio"."<br/>";
}else{
	
	$destino = "animalia.app@gmail.com";
	$cambiarNombre = strtolower($nombre);
	$enviado = ucwords($cambiarNombre)." ha enviado un mensaje.\n";
	$enviado .= "Su correo es $email y su mensaje es:\n";
	$enviado .=$mensaje;
	
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers .="Content-type:text/html; charset=UTF-8\r\n";
	$headers .="FROM ".$_POST['email']."\r\n";
	
	
	$asunto = ucwords($cambiarNombre) ." ha enviado un email";
	if(mail($destino, $asunto, $enviado, $headers)){
		header ("Location: index.html");
		}else{
			echo "Error en el envio de los datos";
			}

}
?>
</body>
</html>