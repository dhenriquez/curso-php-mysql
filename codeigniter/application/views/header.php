<?php defined('BASEPATH') OR exit('Acceso directo no permitido'); ?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Daniel Henríquez</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="<? echo base_url('assets/css/estilo.css'); ?>?v=4">

</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="<?php echo site_url('sitio');?>">DH</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php if($active=='index'){ echo 'active'; }; ?>">
					<a class="nav-link" href="<?php echo site_url('sitio');?>">Home</a>
				</li>
				<li class="nav-item <?php if($active=='youtube'){ echo 'active'; }; ?>">
					<a class="nav-link" href="<?php echo site_url('sitio/youtube');?>">Youtube</a>
				</li>
				<li class="nav-item <?php if($active=='clima'){ echo 'active'; }; ?>">
					<a class="nav-link" href="<?php echo site_url('sitio/clima');?>">Clima</a>
				</li>
				<li class="nav-item <?php if($active=='contacto'){ echo 'active'; }; ?>">
					<a class="nav-link" href="<?php echo site_url('sitio/contacto');?>">Contacto</a>
				</li>
			</ul>
			<ul class="navbar-nav my-2 my-md-0">
				<?php if(!$this->session->has_userdata('usuario')){ ?>
				<li class="nav-item <?php if($active=='login'){ echo 'active'; }; ?>">
					<a class="nav-link" href="<?php echo site_url('usuario/login');?>">Login</a>
				</li>
				<li class="nav-item <?php if($active=='registrar'){ echo 'active'; }; ?>">
					<a class="nav-link" href="<?php echo site_url('usuario/registrar');?>">Registrar</a>
				</li>
				<?php }else{ ?>
				<li class="nav-item <?php if($active=='perfil'){ echo 'active'; }; ?>">
					<a class="nav-link" href="<?php echo site_url('usuario/perfil');?>" title="Ver perfil"><?php echo $this->session->usuario_nombre;?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('usuario/salir');?>" title="Salir">Salir</a>
				</li>
				<?php }; ?>
			</ul>
		</div>
	</nav>