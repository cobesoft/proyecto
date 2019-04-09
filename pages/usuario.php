<div class="form-container">
  <div class="container">
    <h2 id="usuario_titulo">Usuario</h2>
    <form action="index.php" method="post">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Cédula</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
              <input type="text" class="form-control" id="usrcedula">
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="">Nombre</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" id="usrnombre">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Correo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input type="email" class="form-control" id="prvcorreo">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Usuario</label>
            <input type="text" class="form-control" id="usrusuario">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Perfil</label>
            <select class="form-control" name="usrperf" id="usrperf">
              <option selected disabled>Seleccione perfil</option>
              <option value="1">Jefe de Bodega</option>
              <option value="2">Auxiliar de Bodega</option>
              <option value="3">Auxiliar Administrativo</option>
              <option value="4">Vendedor</option>
            </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Estado</label>
            <input type="number" class="form-control" id="usrestid" name= "usrestid" min= "1" max="3">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary" id="usuario_boton">Agregar</button>
        </div>
      </div>
    </form>
  </div>
</div>
