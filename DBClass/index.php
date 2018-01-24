<?php
include('autoload.php');

$DB = new Conexion();
$Producto = new Producto($DB);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tienda</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
 <div class="container">
 	<?php if($Producto->error()){ echo '<div class="row"><div class="col-12"><div class="alert alert-danger">'.$Producto->error().'</div></div></div>'; exit(); }?>
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="agregar.php">Agregar</a></li>
	</ul>
	<?php
	$productos = $Producto->getProductos();
	if($productos){
	?>
	<h3 class="display-4">Productos</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Código</th>
				<th>Producto</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Agregar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($productos as $p){ ?>
			<tr>
				<td><?php echo $p->codigo; ?></td>
				<td><?php echo $p->producto; ?></td>
				<td><?php echo $p->descripcion; ?></td>
				<td><?php echo $p->precio; ?></td>
				<td><a href="?agregar=<?php echo $p->codigo; ?>" title="<?php echo $p->producto; ?>">Agregar</a></td>
			</tr>
			<?php }; ?>
		</tbody>
	</table>
	<?php }; ?>
 </div>
 
</body>
</html>