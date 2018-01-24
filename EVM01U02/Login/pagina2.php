<?php
session_start()
?>
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

if ($Conexion->logeado()){
	echo 'Bienvenido '.$_SESSION['usuario'];
	echo '<br /><a href="pagina3.php">Pagina 3</a>';
	echo '<br /><a href="salir.php">Cerrar sesion</a>';
}
else {
?>
	<script type="text/javascript">
		alert('<?php echo $Conexion->error();?>');
		window.location='inicio.html'
	</script>
<?php
}
?>
</body>
</html>