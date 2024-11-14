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
        <form action="../app/controllers/usuarios/agregar_usuario.php" method="POST" class="form-neon" autocomplete="off" style="background-color: #f3f4f6; padding: 20px; border-radius: 5px;">
            <fieldset>
                <legend style="color: #4a5568;"><i class="fas fa-user"></i> &nbsp; Agregar Usuario</legend>
                <div class="container-fluid">
                    <div class="row">                        

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="id_empleado" class="bmd-label-floating" style="color: #2d3748;">ID Empleado</label>
                                <select class="form-control" name="id_empleado" id="id_empleado" style="border-color: #cbd5e0;">
                                    <option value="">Seleccione un empleado</option>
                                    <?php
                                    $query = $pdo->prepare("SELECT * FROM empleado");
                                    $query->execute();
                                    $resultado = $query->fetchAll();
                                    foreach ($resultado as $fila) {
                                    ?>
                                    <option value="<?php echo $fila['id_empleado']; ?>"><?php echo $fila['DNI'] . ' - ' . $fila['Nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nombre_usuario" class="bmd-label-floating" style="color: #2d3748;">Nombre de Usuario</label>
                                <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="correo" class="bmd-label-floating" style="color: #2d3748;">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo" maxlength="250" style="border-color: #cbd5e0;" readonly>
                            </div>
                        </div>


                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="estado" class="bmd-label-floating" style="color: #2d3748;">Estado</label>
                                <input type="text" class="form-control" name="estado" id="estado" maxlength="50" style="border-color: #cbd5e0;" readonly>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password" class="bmd-label-floating" style="color: #2d3748;">Password</label>
                                <input type="password" class="form-control" name="password" id="password" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="repetir_password" class="bmd-label-floating" style="color: #2d3748;">Repetir Password</label>
                                <input type="password" class="form-control" name="repetir_password" id="repetir_password" maxlength="100" style="border-color: #cbd5e0;">
                            </div>
                        </div>




                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="id_tipo_usuario" class="bmd-label-floating" style="color: #2d3748;">ID Tipo de Usuario</label>
                                <select class="form-control" name="id_tipo_usuario" id="id_tipo_usuario" style="border-color: #cbd5e0;">
                                    <option value="">Seleccione un tipo de usuario</option>
                                    <?php
                                    $query = $pdo->prepare("SELECT * FROM tipo_de_usuario");
                                    $query->execute();
                                    $resultado = $query->fetchAll();
                                    foreach ($resultado as $fila) {
                                    ?>
                                    <option value="<?php echo $fila['id_tipo_usuario']; ?>"><?php echo $fila['nombre']; ?></option>
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


<script>
document.getElementById("id_empleado").addEventListener("change", function() {
    const idEmpleado = this.value;
    
    if (idEmpleado) {
        fetch(`obtener_datos_empleado.php?id_empleado=${idEmpleado}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("nombre_usuario").value = data.Nombre;
                document.getElementById("correo").value = data.Correo;
                document.getElementById("estado").value = data.Estado;
            })
            .catch(error => console.error("Error:", error));
    } else {
        document.getElementById("nombre_usuario").value = "";
        document.getElementById("correo").value = "";
        document.getElementById("estado").value = "";
    }
});
</script>

