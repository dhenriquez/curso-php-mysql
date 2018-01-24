<?php
session_start();
include('autoload.php');

$DB = new Conexion();
$Producto = new Producto($DB);
$Carrito = new Carrito($DB);

$Productos = $Producto->getTodos();

if(isset($_GET['agregar']) && !empty($_GET['agregar'])){
	if($Carrito->agregar($_GET['agregar'])){
		header('Location: inicio.php');
	};
}
if(isset($_GET['eliminar']) && !empty($_GET['eliminar'])){
	if($Carrito->eliminar($_GET['eliminar'])){
		header('Location: inicio.php');
	};
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Carrito</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-8">
			<?php 
				if(!$Productos['error']){
					?>
					<h3 class="display-4">Productos</h3>
					<table class="table table-bordered">
						<tr>
							<th>Cod.</th>
							<th>Producto</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>Añadir</th>
						</tr>
						<tbody>
						<?php foreach($Productos['data'] as $p){ ?>
						<tr>
							<td><?php echo $p->codigo; ?></td>
							<td><?php echo $p->producto; ?></td>
							<td><?php echo $p->descripcion; ?></td>
							<td><?php echo $p->precio; ?></td>
							<td><a href="?agregar=<?php echo $p->codigo; ?>" title="Añadir">introducir</a></td>
						</tr>
						<?php }; ?>
						</tbody>
					</table>
					
					
					<?php
				}else{
					echo '<p>' . $Productos['mensaje'] . '</p>';
				}
			?>
			</div>
			<div class="col-4">
				<h3 class="display-4">Carrito</h3>
				<?php
				$Carro = $Carrito->getTodos();
					if($Carro){
				?>
				<table class="table table-bordered">
					<tr>
						<th>Cod.</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Eliminar</th>
					</tr>
					<tbody>
					<?php
						foreach($Carro as $k=>$codigo){
							$res = $Producto->setProducto($codigo);
							$Carrito->sumarTotal($Producto->precio);
							if($res['error']){ break; }
					?>
						<tr>
							<td><?php echo $Producto->codigo; ?></td>
							<td><?php echo $Producto->producto; ?></td>
							<td><?php echo $Producto->precio; ?></td>
							<td><a href="?eliminar=<?php echo $k+1;?>" class="eliminar">Eliminar</a></td>
						</tr>
					<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2">Total</th>
							<th><?php echo $Carrito->total; ?></th>
							<th></th>
						</tr>
					</tfoot>
				</table>
				<?php }else{ ?>
				<div class="alert alert-info">Carrito vacío</div>
				<?php }; ?>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(e) {
	$('.eliminar').on('click',function(e){
		if(!confirm('¿Desea eliminar el producto?')){
			e.preventDefault();
		}
	});
});
</script>
</body>
</html>