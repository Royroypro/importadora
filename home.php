<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php


include "app/config.php";
include "layout/sesion.php";
include "layout/header.php";
?>

<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a href="user-update.html">
					<i class="fas fa-user-cog"></i>
				</a>
				<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; DASHBOARD
				</h3>
				<p class="text-justify">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
				</p>
			</div>
			
			<!-- Content -->
			<div class="full-box tile-container">

				<a href="client-new.html" class="tile">
					<div class="tile-tittle">Clientes</div>
					<div class="tile-icon">
						<i class="fas fa-users fa-fw"></i>
						<p>5 Registrados</p>
					</div>
				</a>

				<a href="item-list.html" class="tile">
					<div class="tile-tittle">Items</div>
					<div class="tile-icon">
						<i class="fas fa-pallet fa-fw"></i>
						<p>9 Registrados</p>
					</div>
				</a>

				<a href="reservation-list.html" class="tile">
					<div class="tile-tittle">Prestamos</div>
					<div class="tile-icon">
						<i class="fas fa-file-invoice-dollar fa-fw"></i>
						<p>10 Registrados</p>
					</div>
				</a>

				<a href="user-list.html" class="tile">
					<div class="tile-tittle">Usuarios</div>
					<div class="tile-icon">
						<i class="fas fa-user-secret fa-fw"></i>
						<p>50 Registrados</p>
					</div>
				</a>

				<a href="company.html" class="tile">
					<div class="tile-tittle">Empresa</div>
					<div class="tile-icon">
						<i class="fas fa-store-alt fa-fw"></i>
						<p>1 Registrada</p>
					</div>
				</a>
				
			</div>
			

		</section>

</head>
<body>
    
</body>
</html>


