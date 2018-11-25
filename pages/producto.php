<div class="form-container">
  <div class="container">
    <h2>Producto</h2>
    <form action="index.php" method="post">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label for="idproducto">Id</label>
            <input type="number" class="form-control" id="idproducto" min="0">
          </div>
        </div>
        <div class="col-sm-10">
          <div class="form-group">
            <label for="Nomprod">Nombre Producto</label>
            <input type="text" class="form-control" id="Nomprod">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="descprod">Descripción</label>
            <input type="text" class="form-control" id="descprod" width="300px">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="Precio">Precio</label>
            <div class="input-group">
              <span class="input-group-addon">$</span>
              <input type="number" class="form-control" id="Precio" min="0">
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="cantmin">Cant. Mín. </label>
            <input type="number" class="form-control" id="cantmin" name="quantity" min="0">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="cantmax">Cant. Máx.</label>
            <input type="number" class="form-control" id="cantmax" name="quantity" min="0">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="Estado">Estado</label>
            <input type="number" class="form-control" id="Estado" name= "quantity" min= "1" max="3">
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
