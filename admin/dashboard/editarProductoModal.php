<div class="modal fade" id="editarModal<?php echo $datos['idproducto']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Editar</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="editar_producto.php?idproducto=<?php echo $datos['idproducto']; ?>">
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Producto <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="nombre" value="<?php echo $datos['nombre']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold ">Descripcion <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="descripcion" value="<?php echo $datos['descripcion']; ?>">
            </div>
          </div>
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Precio <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="precio" value="<?php echo $datos['precio']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Descuento <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="descuento" value="<?php echo $datos['descuento']; ?>">
            </div>
          </div>
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Stock <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="stock" value="<?php echo $datos['stock']; ?>">
            </div>
          </div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="editar" class="btn btn-dark"> Guardar</a>
          </form>
      </div>
    </div>
  </div>
</div>