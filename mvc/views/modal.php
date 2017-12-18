<!DOCTYPE html>
<div id="modal-find" class="modal fade" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Buscar Registro
                </h4>
            </div>
            <div class="modal-body">
                <table 
                    id="tbFind"
                    search>
                    <thead>
                        <tr>
                            <th data-field="descripcion">Descripción</th>
                            <th data-field="accion" data-formatter="btnSeleccion" data-events="event_accion_default" class="col-md-1" data-align="center">Acción</th>
                        </tr>
                    </thead>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div id="modal-new" class="modal fade"   >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Nuevo Registro
                </h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>