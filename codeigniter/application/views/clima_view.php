<main role="main">
	<div class="clima">
		<div class="container">
			<div class="titulo row">
				<div class="col-12 text-center">
					<h1 class="display-1">
						<?php echo $titulo; ?>
					</h1>
					<h4 class="display-4">
						<?php echo $descripcion; ?>
					</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-md-center">
			<?php $pronostico = $clima['detalle'][0]; ?>
			<div class="col col-12 col-md-6">
				<div class="card">
					<h5 class="card-header">Clima actual:</h5>
					<img class="card-img-top" src="<?php echo $pronostico['imagen'];?>" alt="<?php echo $pronostico['condicion'];?>">
					<div class="card-body">
						<p class="card-text">
							<strong>Desde:</strong>
							<?php echo $pronostico['desde'];?><br>
							<strong>Hasta:</strong>
							<?php echo $pronostico['hasta'];?><br>
							<strong>Condición:</strong>
							<?php echo $pronostico['condicion'];?><br>
							<strong>Temperatura:</strong>
							<?php echo $pronostico['temperatura'];?>°<br>
							<strong>Precipitaciones:</strong>
							<?php echo $pronostico['precipitacion'];?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<h4 class="display-4">Próximas horas:</h4>
			</div>
			<?php
			for ( $i = 1; $i <= 4; $i++ ) {
				$pronostico = $clima[ 'detalle' ][ $i ];
				?>
			<div class="col-12 col-md-3">
				<div class="card">
					<img class="card-img-top" src="<?php echo $pronostico['imagen'];?>" alt="<?php echo $pronostico['condicion'];?>">
					<div class="card-body">
						<p class="card-text">
							<strong>Desde:</strong> <br>
							<?php echo $pronostico['desde'];?><br>
							<strong>Hasta:</strong> <br>
							<?php echo $pronostico['hasta'];?><br>
							<strong>Condición:</strong> <br>
							<?php echo $pronostico['condicion'];?><br>
							<strong>Temperatura:</strong> <br>
							<?php echo $pronostico['temperatura'];?>°<br>
							<strong>Precipitaciones:</strong> <br>
							<?php echo $pronostico['precipitacion'];?>
						</p>
					</div>
				</div>
			</div>
			<?php }; ?>
		</div>
	</div>
</main><!-- /.container -->