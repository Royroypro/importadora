<?php
include "../app/config.php";
include "../layout/sesion.php";
include "../layout/header.php";

include "../layout/footer.php";


?>
<!-- Page content -->


<section class="full-box page-content">
 <br><br>
<?php include "../almacen/layout/header.php";?>
    <!-- Content here-->
    <div class="container-fluid" style="margin: 50px 0;">
        <form action="../app/controllers/almacen/agregar_almacen.php" method="POST" class="form-neon" autocomplete="off" style="background-color: #f3f4f6; padding: 20px; border-radius: 5px;">
            <fieldset>
                <legend style="color: #4a5568;"><i class="fas fa-user"></i> &nbsp; Agregar Almacenaje</legend>
                <div class="container-fluid">
                    <div class="row">                        

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="capacidad" class="bmd-label-floating" style="color: #2d3748;">Capacidad</label>
                                <input type="number" step="0.01" class="form-control" name="capacidad" id="capacidad" maxlength="10" style="border-color: #cbd5e0;">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="número_de_estante" class="bmd-label-floating" style="color: #2d3748;">Número de Estante</label>
                                <input type="text" class="form-control" name="número_de_estante" id="número_de_estante" maxlength="50" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="ubicación" class="bmd-label-floating" style="color: #2d3748;">Ubicación</label>
                                <input type="text" class="form-control" name="ubicación" id="ubicación" maxlength="255" style="border-color: #cbd5e0;">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="estado" class="bmd-label-floating" style="color: #2d3748;">Estado</label>
                                <input type="text" class="form-control" name="estado" id="estado" maxlength="50" style="border-color: #cbd5e0;">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="id_tp_almacena" class="bmd-label-floating" style="color: #2d3748;">ID Tipo de Almacenaje</label>
                                <select class="form-control" name="id_tp_almacena" id="id_tp_almacena" style="border-color: #cbd5e0;">
                                    <option value="">Seleccione un tipo de almacenaje</option>
                                    <?php
                                    $query = $pdo->prepare("SELECT * FROM tipo_de_almacenaje");
                                    $query->execute();
                                    $resultado = $query->fetchAll();
                                    foreach ($resultado as $fila) {
                                    ?>
                                    <option value="<?php echo $fila['id_tp_almacena']; ?>"><?php echo $fila['nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
            <br>
            <p class="text-center" style="margin-top: 40px;">
                <button type="reset" class="btn btn-raised btn-dark btn-sm" style="background-color: #718096;"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-raised btn-success btn-sm" style="background-color: #48bb78;"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
            </p>
        </form>
    </div>    

    <div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>CAPACIDAD</th>
								<th>NÚMERO DE ESTANTE</th>
								<th>UBICACIÓN</th>
								<th>ESTADO</th>
								<th>TIPO DE ALMACENAJE</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = $pdo->prepare("SELECT a.id_almacenaje, a.capacidad, a.número_de_estante, a.ubicación, a.estado, t.nombre as tipo_almacenaje
													FROM almacenaje a
													INNER JOIN tipo_de_almacenaje t ON a.id_tp_almacena = t.id_tp_almacena");
							$query->execute();
							$resultado = $query->fetchAll();
							foreach ($resultado as $fila) {
							?>
								<tr class="text-center">
									<td><?php echo $fila['id_almacenaje']; ?></td>
									<td><?php echo $fila['capacidad']; ?></td>
									<td><?php echo $fila['número_de_estante']; ?></td>
									<td><?php echo $fila['ubicación']; ?></td>
									<td><?php echo $fila['estado']; ?></td>
									<td><?php echo $fila['tipo_almacenaje']; ?></td>
									<td>
										<a href="almacen-update.php?id_almacenaje=<?php echo $fila['id_almacenaje']; ?>" class="btn btn-success">
											<i class="fas fa-sync-alt"></i> 
										</a>
									</td>
									<td>
										<a href="almacen-delete.php?id_almacenaje=<?php echo $fila['id_almacenaje']; ?>" class="btn btn-danger">
											<i class="fas fa-trash-alt"></i>
										</a>
									</td>
								</tr>
							<?php
							}
							?>

</section>