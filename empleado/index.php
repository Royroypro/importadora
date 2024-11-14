<?php
include "../app/config.php";
include "../layout/sesion.php";
include "../layout/header.php";
include "../layout/footer.php";

?>

<!-- Page content -->
<section class="full-box page-content">
 


    <!-- Content here-->
    <div class="container-fluid" style="margin: 50px 0;">
        <form action="" class="form-neon" autocomplete="off" style="background-color: #f3f4f6; padding: 20px; border-radius: 5px;">
            <fieldset>
                <legend style="color: #4a5568;"><i class="fas fa-user"></i> &nbsp; Agregar Empleado</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="DNI" class="bmd-label-floating" style="color: #2d3748;">DNI</label>
                                <input type="text" class="form-control" name="DNI" id="DNI" maxlength="20" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="Nombre" class="bmd-label-floating" style="color: #2d3748;">Nombre</label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="Apaterno" class="bmd-label-floating" style="color: #2d3748;">Apellido Paterno</label>
                                <input type="text" class="form-control" name="Apaterno" id="Apaterno" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="Amaterno" class="bmd-label-floating" style="color: #2d3748;">Apellido Materno</label>
                                <input type="text" class="form-control" name="Amaterno" id="Amaterno" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email" class="bmd-label-floating" style="color: #2d3748;">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email" id="email" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="dirección" class="bmd-label-floating" style="color: #2d3748;">Dirección</label>
                                <input type="text" class="form-control" name="dirección" id="dirección" maxlength="255" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="teléfono" class="bmd-label-floating" style="color: #2d3748;">Teléfono</label>
                                <input type="text" class="form-control" name="teléfono" id="teléfono" maxlength="20" style="border-color: #cbd5e0;">
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
                                <label for="id_cargo" class="bmd-label-floating" style="color: #2d3748;">ID Cargo</label>
                                <select class="form-control" name="id_cargo" id="id_cargo" style="border-color: #cbd5e0;">
                                    <option value="">Seleccione un cargo</option>
                                    <?php
                                    $query = $pdo->prepare("SELECT * FROM cargo");
                                    $query->execute();
                                    $resultado = $query->fetchAll();
                                    foreach ($resultado as $fila) {
                                    ?>
                                    <option value="<?php echo $fila['id_cargo']; ?>"><?php echo $fila['nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <br><br><br>
            <p class="text-center" style="margin-top: 40px;">
                <button type="reset" class="btn btn-raised btn-dark btn-sm" style="background-color: #718096;"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-raised btn-success btn-sm" style="background-color: #48bb78;"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
            </p>
        </form>
    </div>    

</section>

