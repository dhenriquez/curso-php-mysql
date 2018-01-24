<main role="main">
	<div class="youtube">
		<div class="container">
			<div class="titulo row">
				<div class="col-12 text-center">
					<h1 class="display-1"><?php echo $titulo; ?></h1>
					<h4 class="display-4"><?php echo $descripcion; ?></h4>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card-group">
				<?php
				for($i=0; $i<5; $i++){ ?>
						<div class="card">
							<img class="card-img-top" src="<?php echo $youtube[$i]['imagen'];?>" alt="<?php echo $youtube[$i]['titulo'];?>">
							<div class="card-body">
								<h5 class="card-title"><?php echo ($i+1) . ". " . $youtube[$i]['titulo'];?></h5>
								<a href="<?php echo $youtube[$i]['link'];?>" class="btn btn-primary" target="_blank">Ver video</a>
							</div>
						</div>
				<?php }; ?>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-12">
				<div class="card-group">
				<?php
				for($i=5; $i<10; $i++){ ?>
						<div class="card">
							<img class="card-img-top" src="<?php echo $youtube[$i]['imagen'];?>" alt="<?php echo $youtube[$i]['titulo'];?>">
							<div class="card-body">
								<h5 class="card-title"><?php echo ($i+1) . ". " . $youtube[$i]['titulo'];?></h5>
								<a href="<?php echo $youtube[$i]['link'];?>" class="btn btn-primary" target="_blank">Ver video</a>
							</div>
						</div>
				<?php }; ?>
				</div>
			</div>
		</div>
	</div>
</main><!-- /.container -->