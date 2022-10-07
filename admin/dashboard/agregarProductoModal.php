<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="agregar_producto.php">
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Producto <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="nombre">
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold ">Descripcion <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="descripcion">
            </div>
          </div>
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Precio <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="precio">
            </div>
            <div class="form-group col-md-6">
            <label class="font-weight-bold">Categoria <span class="text-danger"></span></label>
              <select class="form-control" name="categoria" id="categoria">
                <?php  ?>
                <option value="">Seleccionar Categoria</option>
                <option value="1/Portatiles">Portatiles</option>
                <option value="2/Monitores">Monitores</option>
                <option value="3/Componentes">Componentes</option>
                <option value="4/Accesorios">Accesorios</option>
                <option value="5/Torres">Torres</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="font-weight-bold">Seleccione Imagen <span class="text-danger"></span></label>
            <input class="form-control" type="file" name="imagen">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="agregar" class="btn btn-danger">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

