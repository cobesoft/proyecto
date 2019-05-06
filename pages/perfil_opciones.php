<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<div class="container">
    <h2>Opciones de Menú Según Perfil
        <a href="#" class="btn btn-primary a-btn-slide-text" id="perfil_n" onclick="mostrarModal('perfil','n')">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Nuevo</strong></span>
        </a></h2>
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead class="text-center">
            <tr>
                <th>Id Perfil</th>
                <th>Nombre Perfil</th>
                <th>Opciones Habilitadas</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $resultado = $consulta->consultaOpciones();
            $lista = '';
            foreach ($resultado as $row) {
                if ($row['OpcIdPadre'] != 0)
                    $lista .= "<option value='$row[OpcId]'>$row[OpcNombre]</option>";
            }
            $resultado = $consulta->consultaPerfilOpciones();
            foreach ($resultado as $row) {
                echo "<tr>
            <td>$row[PerId]</td>
            <td>$row[PerDescripcion]</td>
            <td>
                <select data-placeholder='Opciones disponibles' id='sel_$row[PerId]' class='chosen-select' multiple>
                    <option value=''></option>
                    $lista;
                </select>
                <script>listaOpciones('sel_$row[PerId]', '$row[PerOpcOpcIds]');</script>
                <input type='hidden' name='PerOpcOpcIds'm id='PerOpcOpcIds' value='$row[PerOpcOpcIds]'>
            </td>
            <td>
                <div>
                    <a href='#' class='btn btn-primary a-btn-slide-text' id='perfil_e' onclick='mostrarModal(\"perfil\",\"e\",$row[PerId])'>
                        <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                        <span><strong>Editar</strong></span>
                    </a>
                    <a href='#' class='btn btn-primary a-btn-slide-text' id='opciones_e' onclick='editaOpciones($row[PerId])'>
                        <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                        <strong><span id='opciones_e_$row[PerId]'>Opciones</span></strong>
                    </a>
                    <a href='#' class='btn btn-primary a-btn-slide-text' id='perfil_el' onclick='mostrarModal(\"perfil\",\"el\",$row[PerId])'>
                        <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                        <span><strong>Eliminar</strong></span>
                    </a>
                </div>
            </td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
