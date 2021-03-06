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
				<?php echo form_open('sitio/contacto'); ?>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nombre">Nombre*</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo set_value('nombre');?>">
					</div>
					<div class="form-group col-md-6">
						<label for="apellido">Apellido*</label>
						<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo set_value('apellido');?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="asunto">Asunto</label>
						<input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" value="<?php echo set_value('asunto');?>">
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email*</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email');?>">
					</div>
				</div>
				<div class="form-group">
					<label for="mensaje">Mensaje*</label>
					<textarea class="form-control" id="mensaje" name="mensaje" placeholder="Mensaje"><?php echo set_value('mensaje');?></textarea>
				</div>
				<p>* Campos requeridos</p>
				<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
		</div>
	</div>
</main><!-- /.container -->