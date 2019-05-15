<?php
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<a class="bClose">X<a/>
    <div class="form-container">
        <div class="container">
            <h2 id="usuario_titulo">Usuario</h2>
            <form id="usuario" name="usuario">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="UsrCedula">Cédula</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                                <input type="text" class="form-control" id="UsrCedula" name="UsrCedula">
                                <input type="hidden" id="UsrId" name="UsrId">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="UsrNombre">Nombres</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" id="UsrNombre" name="UsrNombre">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="UsrApellido">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" id="UsrApellido" name="UsrApellido">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="UsrCorreo">Correo</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" id="UsrCorreo" name="UsrCorreo">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="UsrUsuario">Usuario</label>
                            <input type="text" class="form-control" id="UsrUsuario" name="UsrUsuario">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="UsrClave">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="chClave" id="chClave" onclick="chbxClave();">
                                        <input type="password" class="form-control" id="UsrClave" name="UsrClave" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="UsrPerPerId">Perfil</label>
                            <select class="form-control" name="UsrPerPerId" id="UsrPerPerId">
                                <option selected disabled>Seleccione perfil</option>
                                <?php
                                $resultado = $consulta->consultaPerfiles();
                                foreach ($resultado as $row)
                                    echo "<option value='$row[PerId]'>$row[PerDescripcion]</option>";
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="UsrPerEstId">Estado</label>
                            <select class="form-control" id="UsrPerEstId" name="UsrPerEstId">
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
                        <button type="button" class="btn btn-primary" id="usuario_boton">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
