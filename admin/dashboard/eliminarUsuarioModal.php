<div class="modal fade" id="eliminaModal<?php echo $datos['Id']; ?>" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                ¿Deseas eliminar este usuario?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <a id="btn-eliminar"  href="eliminar_usuario.php?Id=<?php echo $datos['Id'];?>" class="btn btn-danger" name="eliminar" onclick="eliminar()" value="<?php echo $datos['Id']; ?>">Eliminar</a> 
            </div>
        </div>
    </div>
</div>