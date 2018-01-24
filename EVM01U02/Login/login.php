<?php
session_start();
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
$respuesta = $Conexion->login($_POST['usuario'],$_POST['password']);

if($respuesta){
	$_SESSION['usuario'] = $_POST['usuario'];
	$_SESSION['password'] = $_POST['password'];
	?>
	<script type="text/javascript">
		window.location='pagina2.php'
	</script>
	<?php
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