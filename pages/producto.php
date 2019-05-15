<?php
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<a class="bClose">X<a/>
<div class="form-container">
    <div class="container">
        <h2 id="producto_titulo">Producto</h2>
        <form id="producto" name="producto">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="ProId">Id</label>
                        <input type="number" class="form-control" id="ProId" name="ProId" min="0">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="ProNombre">Nombre Producto</label>
                        <input type="text" class="form-control" id="ProNombre" name="ProNombre">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ProPrvId">Proveedor</label>
                        <select class="form-control" id="ProPrvId" name="ProPrvId">
                            <option value="" disabled selected>Seleccione Proveedor</option>
                            <?php
                            $resultado = $consulta->consultaProveedores();
                            foreach ($resultado as $row)
                                echo "<option value='$row[PrvId]'>$row[PrvNombre]</option>"
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="ProDescripcion">Descripción</label>
                        <input type="text" class="form-control" id="ProDescripcion" name="ProDescripcion">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ProTprId">Tipo Producto</label>
                        <select class="form-control" id="ProTprId" name="ProTprId">
                            <option value="" disabled selected>Seleccione Tipo</option>
                            <?php
                            $resultado = $consulta->consultaTipoProducto();
                            foreach ($resultado as $row)
                                echo "<option value='$row[TprId]'>$row[TprTipo]</option>";
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="ProPrecio">Precio</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="number" class="form-control" id="ProPrecio" name="ProPrecio" min="0">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="ProCantMin">Cant. Mín. </label>
                        <input type="number" class="form-control" id="ProCantMin" name="ProCantMin" min="0">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="ProCantMax">Cant. Máx.</label>
                        <input type="number" class="form-control" id="ProCantMax" name="ProCantMax" min="0">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="ProEstId">Estado</label>
                        <select class="form-control" id="ProEstId" name="ProEstId">
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
                    <button type="button" class="btn btn-primary" id="producto_boton">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</div>
