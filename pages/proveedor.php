<?php
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<a class="bClose">X<a/>
<div class="form-container">
    <div class="container">
        <h2 id="proveedor_titulo">Proveedor</h2>
        <form action="index.php" method="post">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="PrvNit">Nit/CC</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="PrvNit" name="PrvNit">
                            <input type="hidden" id="PrvId" name="PrvId">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="PrvNombre">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="PrvNombre" name="PrvNombre">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="PrvTelefono">Telefono</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                            <input type="text" class="form-control" id="PrvTelefono" name="PrvTelefono">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="PrvDireccion">Direccion</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input type="text" class="form-control" id="PrvDireccion" name="PrvDireccion">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="PrvCorreo">Correo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" class="form-control" id="PrvCorreo" name="PrvCorreo">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="PrvEstId">Estado</label>
                        <select class="form-control" id="PrvEstId" name="PrvEstId">
                            <option value="" disabled selected>Seleccione Estado</option>
                            <?php
                            $resultado = $consulta->consultaEstados();
                            foreach ($resultado as $row)
                                echo "<option value='$row[EstId]'>$row[EstDescripcion]</option>";
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary" id="proveedor_boton">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</div>
