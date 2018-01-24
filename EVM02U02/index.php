<?php
require('class.datos.php');
$Datos = new Datos();
$Clima = $Datos->Clima();
$Youtube = $Datos->Youtube();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unidad 6 -  Daniel Henríquez</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h5 class="display-4"><?php echo $Clima['ciudad'] . ", " . $Clima['pais']; ?></h5>
				<h4 class="display-5">Clima</h4>
			</div>
		</div>
		<div class="row">
				<?php
				for($i=0;$i<=3;$i++){
				$pronostico = $Clima['detalle'][$i];
				?>
				<div class="col-3">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="<?php echo $pronostico['imagen'];?>" alt="<?php echo $pronostico['condicion'];?>">
						<div class="card-body">
							<p class="card-text">
							<strong>Desde:</strong> <?php echo $pronostico['desde'];?><br>
							<strong>Hasta:</strong> <?php echo $pronostico['hasta'];?><br>
							<strong>Condición:</strong> <?php echo $pronostico['condicion'];?><br>
							<strong>Temperatura:</strong> <?php echo $pronostico['temperatura'];?>°<br>
							<strong>Precipitaciones:</strong> <?php echo $pronostico['precipitacion'];?>
							</p>
						</div>
					</div>
				</div>
				<?php }; ?>
		</div>
		<div class="row">
			<div class="col-12">
				<h5 class="display-4">Youtube</h5>
			</div>
		</div>
		<div class="row">
				<?php
				foreach($Youtube as $video){
				?>
				<div class="col-3">
					<div class="card">
						<img class="card-img-top" src="<?php echo $video['imagen'];?>" alt="<?php echo $video['titulo'];?>">
						<div class="card-body">
							<h5 class="card-title"><?php echo substr($video['titulo'],0,35);?>...</h5>
							<p class="card-text"><?php echo substr($video['descripcion'],0,90);?>...</p>
							<a href="<?php echo $video['link'];?>" class="btn btn-primary" target="_blank">Ver video</a>
						</div>
					</div>
				</div>
				<?php }; ?>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>