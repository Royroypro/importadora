<?php
include "../app/config.php";
include "../layout/sesion.php";
include "../layout/header.php";
include "../layout/footer.php";

?>
		<!-- Page content -->
		<section class="full-box page-content">


			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE EMPLEADOS
				</h3>

			</div>

			
			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>DNI</th>
								<th>NOMBRE</th>
								<th>APELLIDO PATERNO</th>
								<th>APELLIDO MATERNO</th>
								<th>EMAIL</th>
								<th>DIRECCION</th>
								<th>TELEFONO</th>
								<th>ESTADO</th>
								<th>CARGO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT e.id_empleado, e.DNI, e.Nombre, e.Apaterno, e.Amaterno, e.email, e.dirección, e.teléfono, e.estado, c.nombre AS cargo FROM empleado e INNER JOIN cargo c ON e.id_cargo = c.id_cargo ORDER BY e.id_empleado";
							$stmt = $pdo->prepare($query);
							$stmt->execute();
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								echo "<tr class='text-center' >";
								static $cont = 1;
								echo "<td>" . $cont++ . "</td>";
								echo "<td>" . $row['DNI'] . "</td>";
								echo "<td>" . $row['Nombre'] . "</td>";
								echo "<td>" . $row['Apaterno'] . "</td>";
								echo "<td>" . $row['Amaterno'] . "</td>";
								echo "<td>" . $row['email'] . "</td>";
								echo "<td>" . $row['dirección'] . "</td>";
								echo "<td>" . $row['teléfono'] . "</td>";
								echo "<td>" . $row['estado'] . "</td>";
								echo "<td>" . $row['cargo'] . "</td>";
								echo "<td>";
								echo "<a href='empleado-update.php?id_empleado=" . $row['id_empleado'] . "' class='btn btn-success'>";
								echo "<i class='fas fa-sync-alt'></i>";
								echo "</a>";
								echo "</td>";
								echo "<td>";
								echo "<form action='empleado-delete.php' method='POST'>";
								echo "<input type='hidden' name='id_empleado' value='" . $row['id_empleado'] . "'>";
								echo "<button type='submit' class='btn btn-warning'>";
								echo "<i class='far fa-trash-alt'></i>";
								echo "</button>";
								echo "</form>";
								echo "</td>";
								echo "</tr>";
							}
							?></tbody>
					</table>
				</div>
			</div>

		</section>

