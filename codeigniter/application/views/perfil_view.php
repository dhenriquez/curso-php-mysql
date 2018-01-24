<main role="main">
	<div class="perfil">
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
			<div class="col-12 col-md-4">
				<img src="<?php echo $grav_url; ?>" alt="Gravatar" class="img-fluid"/>
			</div>
			<div class="col-12 col-md-8">
				<h4>Información del Usuario</h4>
				<hr>
				<p>
					<strong>Usuario</strong>: <?php echo $this->session->usuario;?><br>
					<strong>Nombre completo</strong>: <?php echo $this->session->usuario_nombre;?><br>
					<strong>Email</strong>: <?php echo $this->session->usuario_email;?>
				</p>
			</div>
		</div>
	</div>
</main><!-- /.container -->