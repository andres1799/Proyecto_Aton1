<div class="modal fade" id="editarUsuarioModal<?php echo $datos['Id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Editar</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="editar_usuario.php?Id=<?php echo $datos['Id']; ?>">

          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Nombre <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="Nombre" value="<?php echo $datos['Nombre']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold ">Apellido <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="Apellido" value="<?php echo $datos['Apellido']; ?>">
            </div>
          </div>
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Direccion <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="dic" placeholder="Tu direccion">
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold ">Celular <span class="text-danger"></span></label>
              <input type="number" class="form-control" name="cel" placeholder="Tu tcelular">
            </div>
          </div>
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Usuario <span class="text-danger"></span></label>
              <input type="text" class="form-control" name="usu" placeholder="Tu usuario">
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold ">Contraseña <span class="text-danger"></span></label>
              <input type="password" class="form-control" name="con" placeholder="Tu contraseña">
            </div>
          </div>
          <div class="form-row mb-2">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Documento <span class="text-danger"></span></label>
              <input type="number" class="form-control" name="id" placeholder="Tu documento">
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold ">Correo <span class="text-danger"></span></label>
              <input type="email" class="form-control" name="cor" placeholder="Tu correo">
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

