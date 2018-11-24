<div class="jumbotron">
<div class="container">
<div class="shadow p-4 mb-4 bg-white">
  <div class="col-sm-2">
<h2>Producto</h2>
  </div>
<form class="form-inline" action="index.html" method="post">
  <div class="form-group">
    <div class="col-sm-2">
      <label for="">Id</label>
      <input type="number" class="form-control" id="idproducto" placeholder="">
      </div>
    </div>

  <div class="form-group">
    <div class="col-sm-8">
      <label for="">Nombre_producto</label>
      <input type="text" class="form-control" id="Nomprod" placeholder="">
    </div>
  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-6">
      <label for="">Descripción</label>
      <input type="text" class="form-control" id="descprod" width="300px" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-5">
      <label for="">Cant.Min </label>
      <input type="number" class="form-control" id="cantmin" name="quantity" min="0" max="999999999999" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-5">
      <label for="">Cant.Máx</label>
      <input type="number" class="form-control" id="cantmax" name="quantity" min="0" max="999999999999" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
      <label for="">Estado</label>
      <input type="number" class="form-control" id="Estado" name= "quantity" min= "1" max="3" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <label for="">Precio</label>
      <input type="number" class="form-control" id="Precio" placeholder="">
    </div>
  </div>
      <div class="col-sm-6">
    <br>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </div>

</form>
</div>
</div>
</div>
