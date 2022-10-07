<div class="modal fade" id="usuarioRolModal<?php echo $datos['Id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Editar</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="rol.php?Id=<?php echo $datos['Id']; ?>">
          <div class="form-row mb-2">

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