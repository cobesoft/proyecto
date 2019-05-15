<?php
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<a class="bClose">X<a/>
<div class="form-container">
    <div class="container">
        <h2 id="cliente_titulo">Cliente</h2>
        <form id="cliente" name="cliente">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="CliCedula">Nit/CC</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="CliCedula" name="CliCedula">
                            <input type="hidden" id="CliId" name="CliId">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="CliNombre">Nombres</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="CliNombre" name="CliNombre">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="CliApellido">Apellidos</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="CliApellido" name="CliApellido">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="CliTelefono">Telefono</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                            <input type="number" class="form-control" id="CliTelefono" name="CliTelefono">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="CliDireccion">Direccion</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input type="text" class="form-control" id="CliDireccion" name="CliDireccion">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="CliCorreo">Correo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" class="form-control" id="CliCorreo" name="CliCorreo">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="CliEstId">Estado</label>
                        <select class="form-control" id="CliEstId" name="CliEstId">
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
                    <button type="button" class="btn btn-primary" id="cliente_boton">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</div>
