<?php
include "../../app/config.php";
include "../../layout/sesion.php";
include "../../layout/header.php";
include "../../layout/footer.php";


?>
<!-- Page content -->


<section class="full-box page-content">
 <br><br>
<?php include "../../almacen/layout/header.php";?>
    <!-- Content here-->
    <div class="container-fluid" style="margin: 50px 0;">
        <form action="../app/controllers/almacen/agregar_tipo_almacenaje.php" method="POST" class="form-neon" autocomplete="off" style="background-color: #f3f4f6; padding: 20px; border-radius: 5px;">
            <fieldset>
                <legend style="color: #4a5568;"><i class="fas fa-user"></i> &nbsp; Agregar Tipo de Almacenaje</legend>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="bmd-label-floating" style="color: #2d3748;">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="descripción" class="bmd-label-floating" style="color: #2d3748;">Descripción</label>
                                <input type="text" class="form-control" name="descripción" id="descripción" maxlength="255" style="border-color: #cbd5e0;">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="estado" class="bmd-label-floating" style="color: #2d3748;">Estado</label>
                                <input type="text" class="form-control" name="estado" id="estado" maxlength="50" style="border-color: #cbd5e0;">
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

