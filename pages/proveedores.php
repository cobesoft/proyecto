<div class="form-container">
  <div class="container">
    <h2>Proveedor</h2>
    <form action="index.php" method="post">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Nit/CC</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
              <input type="text" class="form-control" id="prvnit">
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="">Nombre</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" id="prvnombre">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Telefono</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
              <input type="number" class="form-control" id="prvtelefono">
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="">Direccion</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              <input type="text" class="form-control" id="prvdireccion">
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
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Estado</label>
            <input type="number" class="form-control" id="prvestid" name= "quantity" min= "1" max="3">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </form>
  </div>
</div>
