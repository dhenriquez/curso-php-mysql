<main role="main">
	<div class="contacto">
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
		<div class="row">
			<div class="col-12 ">
				<h1 class="display-1">
					<?php echo $enviado; ?>
				</h1>
				<p><?php echo anchor('sitio/contacto', 'Volver'); ?></p>
			</div>
		</div>
	</div>
</main><!-- /.container -->