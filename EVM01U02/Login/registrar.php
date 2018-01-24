<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
include ('conect.php');
	
$Conexion = new Conexion();

$respuesta = $Conexion->registrar($_POST['usuario'],$_POST['password'],$_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['dni']);

if($respuesta){
	echo 'El usuario ha sido dado de alta';
	echo '<a href="inicio.html">Ingresar</a>';
}else{
	?>
	<script type='text/javascript'>
		alert('<?php echo $Conexion->error();?>');
		window.location='inicio.html'
	</script>
	<?php
}
?>
</body>
</html>