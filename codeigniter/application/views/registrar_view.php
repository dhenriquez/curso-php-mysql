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
				<?php if(validation_errors()){ ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<?php echo validation_errors(); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php }; ?>
				<?php echo form_open('usuario/registrar'); ?>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nombre">Nombre completo*</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo set_value('nombre');?>">
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email*</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email');?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="usuario">usuario*</label>
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo set_value('usuario');?>">
					</div>
					<div class="form-group col-md-6">
						<label for="password">Contraseña</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
					</div>
				</div>
				<p>* Campos requeridos</p>
				<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
		</div>
	</div>
</main><!-- /.container -->