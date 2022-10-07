<div class="modal fade" id="eliminaModalP<?php echo $datos['idproducto']; ?>" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                ¿Deseas eliminar este producto?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <a id="btn-eliminar"  href="eliminar_producto.php?idproducto=<?php echo $datos['idproducto'];?>" class="btn btn-danger" name="eliminar" onclick="eliminar()" value="<?php echo $datos['idproducto']; ?>">Eliminar</a> 
            </div>
        </div>
    </div>
</div>