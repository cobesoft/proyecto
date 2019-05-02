<?php
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<a class="bClose">X<a/>
    <div class="form-container">
        <div class="container">
            <h2 id="perfil_titulo">Perfil</h2>
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="PerDescripcion">Perfil</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" id="PerDescripcion" name="PerDescripcion">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="PerEstId">Estado</label>
                            <select class="form-control" id="PerEstId" name="PerEstId">
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
                        <button type="submit" class="btn btn-primary" id="perfil_boton">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

