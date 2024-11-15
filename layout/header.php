<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="<?php echo $URL; ?>/SPM/css/normalize.css">
	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="<?php echo $URL; ?>/SPM/css/bootstrap.min.css ?>">
	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="<?php echo $URL; ?>/SPM/css/bootstrap-material-design.min.css">
	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="<?php echo $URL; ?>/SPM/css/all.css">
	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="<?php echo $URL; ?>/SPM/css/sweetalert2.min.css">
	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="<?php echo $URL; ?>/SPM/css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="<?php echo $URL; ?>/SPM/css/style.css">


</head>
<body>
	
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="<?php echo $URL; ?>SPM/assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						<?php echo $nombres_sesion = $usuario['nombre_usuario']; ?> <br><small class="roboto-condensed-light"><?php echo $rol_sesion; ?></small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="<?php echo $URL; ?>/home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Empleados <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo $URL; ?>/empleado"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Empleado</a>
								</li>
								<li>
									<a href="<?php echo $URL; ?>/empleado/lista_empleado.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de empleados</a>
								</li>

							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo $URL; ?>/usuarios"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar usuario</a>
								</li>
								<li>
									<a href="<?php echo $URL; ?>/usuarios/lista_usuarios.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
								</li>
				
							</ul>
						</li>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-warehouse fa-fw"></i> &nbsp; Almacén <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo $URL; ?>/almacen"><i class="fas fa-plus fa-fw"></i> &nbsp; Almacenaje</a>
								</li>
							
								<li>
									<a href="<?php echo $URL; ?>/almacen/productos_almacen"><i class="fas fa-box-open fa-fw"></i> &nbsp; Lista de almacenaje</a>
								</li>
								
						
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="user-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a>
								</li>
								<li>
									<a href="user-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
								</li>
								<li>
									<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="company.html"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Empresa</a>
						</li>
					</ul>
				</nav>
			</div>
		</section>

		
	</main>
	
	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="<?php echo $URL; ?>SPM/js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="<?php echo $URL; ?>SPM/js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="<?php echo $URL; ?>SPM/js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="<?php echo $URL; ?>SPM/js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="<?php echo $URL; ?>SPM/js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="<?php echo $URL; ?>SPM/js/main.js" ></script>
</body>
</html>