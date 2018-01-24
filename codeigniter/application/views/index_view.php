<main role="main">
	<div class="index">
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
		<div class="col-12">
			<div class="card-columns">
				<?php
				foreach ( $noticias as $noticia ) {
					?>
				<div class="card">
					<img class="card-img-top" src="<?php echo $noticia['imagen'];?>" alt="<?php echo $noticia['titulo'];?>">
					<div class="card-body">
						<h5 class="card-title">
							<?php echo $noticia['titulo'];?>
						</h5>
						<a href="<?php echo $noticia['link'];?>" class="btn btn-primary" target="_blank">Ver noticia</a>
					</div>
				</div>
				<?php }; ?>
			</div>
		</div>
	</div>
</main><!-- /.container -->