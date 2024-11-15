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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
				</h3>

			</div>

			
			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>NOMBRE USUARIO</th>
								<th>CORREO</th>
								<th>ESTADO</th>
								<th>TIPO DE USUARIO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT u.id_usuario, u.nombre_usuario, u.correo, u.estado, t.nombre AS tipo_usuario FROM usuario u INNER JOIN tipo_de_usuario t ON u.id_tipo_usuario = t.id_tipo_usuario ORDER BY u.id_usuario";
							$stmt = $pdo->prepare($query);
							$stmt->execute();
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								echo "<tr class='text-center' >";
								static $cont = 1;
								echo "<td>" . $cont++ . "</td>";
								echo "<td>" . $row['nombre_usuario'] . "</td>";
								echo "<td>" . $row['correo'] . "</td>";
								echo "<td>" . $row['estado'] . "</td>";
								echo "<td>" . $row['tipo_usuario'] . "</td>";
								echo "<td>";
								echo "<a href='usuario-update.php?id_usuario=" . $row['id_usuario'] . "' class='btn btn-success'>";
								echo "<i class='fas fa-sync-alt'></i>";
								echo "</a>";
								echo "</td>";
								echo "<td>";
								echo "<form action='usuario-delete.php' method='POST'>";
								echo "<input type='hidden' name='id_usuario' value='" . $row['id_usuario'] . "'>";
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

